<?php

namespace app\controllers;


use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use app\models\Products;
use app\models\OrderDetails;
use app\models\Orders;
/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderDetailsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Order models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'admin_layout';
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'admin_layout';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'admin_layout';
        $model = new OrderDetails();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->layout = 'admin_layout';
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->layout = 'admin_layout';
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $this->layout = 'login_layout';
   
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }
        if (($model = OrderDetails::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
   
    public function actionAddToCart($product_id)
    {
        $product = Products::findOne($product_id);
        
        // Kiểm tra số lượng sản phẩm còn lại
        if (!$product || $product->product_quantity <= 0) {
            throw new NotFoundHttpException('Sản phẩm không tồn tại hoặc đã hết hàng.');
        }
    
        // Giảm số lượng sản phẩm đi 1
        $product->product_quantity -= 1;
        $product->save();
    
        $price = $product->product_price; 
    
        // Lấy ID người dùng đăng nhập gần nhất
        $latestLoginId = Yii::$app->user->identity->getId();
    
        // Tìm đơn hàng cuối cùng
        $latestOrder = Orders::find()
            ->orderBy(['order_id' => SORT_DESC])
            ->one();
    
        if (!Yii::$app->session->get('orderCreated')) {
            $order = new Orders();
            $order->order_id = $latestOrder->order_id + 1;
            $order->order_date = date('Y-m-d H:i:s');
            $order->user_id = $latestLoginId;
            $order->status = 2;
            $order->totals=0; // Status của đơn hàng chưa hoàn thành
            $order->save();
            $latestOrder = Orders::find()
                ->orderBy(['order_id' => SORT_DESC])
                ->one(); // Cập nhật lại thông tin đơn hàng sau khi tạo
    
            // Đặt biến cờ trong session để đánh dấu là đã tạo đơn hàng
            Yii::$app->session->set('orderCreated', true);
        }
    
        $latestOrderId = $latestOrder->order_id;
    
        $existingCartItem = OrderDetails::find()
            ->where(['order_id' => $latestOrderId, 'product_id' => $product_id, 'status' => 1])
            ->one();
    
        if ($existingCartItem) {
            $existingCartItem->quantity += 1;
            $existingCartItem->total = $price * $existingCartItem->quantity;
            $existingCartItem->save();
        } else {
            $cartItem = new OrderDetails();
           
            $cartItem->order_id = $latestOrderId;
            $cartItem->product_id = $product_id;
            $cartItem->quantity = 1; 
            $cartItem->status = 1;
       
            $cartItem->total = $price * $cartItem->quantity; 
            $cartItem->save();
        }
    
        // Lấy thông tin giỏ hàng sau khi cập nhật
        $cartItems = OrderDetails::find()->where(['order_id' => $latestOrderId, 'status'=>1])->all();
        
        // Tính tổng số tiền trong giỏ hàng
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item->quantity * $item->product->product_price;
           
        }
        
        // Lấy đơn hàng cuối cùng
$latestOrder = Orders::find()
->orderBy(['order_id' => SORT_DESC])
->one();

// Cập nhật tổng tiền vào đơn hàng cuối cùng
if ($latestOrder) {
$latestOrder->totals = $totalAmount;
$latestOrder->save();
}
        // Hiển thị trang home với thông tin giỏ hàng cập nhật
        return $this->render('home', ['cartItems' => $cartItems, 'totalAmount' => $totalAmount]);
    }
    


    public function actionClear($item_id)
{
    // Tìm kiếm sản phẩm trong giỏ hàng dựa trên $item_id
    $cartItem = OrderDetails::findOne($item_id);

    // Lấy thông tin đơn hàng cuối cùng của người dùng
    $latestOrder = Orders::find()
        ->where(['user_id' => Yii::$app->user->id])
        ->orderBy(['order_id' => SORT_DESC])
        ->one();

    // Khởi tạo biến toàn cục $totalAmount
    $totalAmount = 0;

    // Kiểm tra xem có sản phẩm nào được tìm thấy hay không
    if ($cartItem !== null && $latestOrder !== null) {
        // Kiểm tra xem sản phẩm thuộc đơn hàng hiện tại không
        if ($cartItem->order_id === $latestOrder->order_id) {
            // Xóa sản phẩm khỏi giỏ hàng
            $cartItem->delete();
            Yii::$app->session->setFlash('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');

            // Tính lại tổng tiền sau khi xóa sản phẩm
            $cartItems = OrderDetails::find()->where(['order_id' => $latestOrder->order_id, 'status' => 1])->all();
            foreach ($cartItems as $item) {
                $totalAmount += $item->quantity * $item->product->product_price;
            }
        } else {
            Yii::$app->session->setFlash('error', 'Sản phẩm không thuộc đơn hàng hiện tại.');
        }
    } else {
        // Nếu không tìm thấy sản phẩm hoặc đơn hàng, thông báo lỗi
        Yii::$app->session->setFlash('error', 'Không thể tìm thấy sản phẩm hoặc đơn hàng.');
    }

    // Hiển thị trang home với thông tin giỏ hàng cập nhật
    return $this->render('home', [
        'cartItems' => OrderDetails::find()->where(['order_id' => $latestOrder->order_id, 'status' => 1])->all(),
        'totalAmount' => $totalAmount,
    ]);

}


    


 

public function actionRevenue()
{
    $this->layout = 'admin_layout';
    $totalRevenue = OrderDetails::find()->sum('total');

    $bestSellingProducts = OrderDetails::find()
        ->select(['product_id', 'SUM(quantity) AS totalQuantity'])
        ->groupBy('product_id')
        ->orderBy(['totalQuantity' => SORT_DESC])
        ->limit(5)
        ->asArray()
        ->all();

    $productsInfo = [];
    foreach ($bestSellingProducts as $product) {
        $productInfo = Products::findOne($product['product_id']); // Thay Products bằng Product
        if ($productInfo) {
            $productsInfo[] = [
                'name' => $productInfo->product_name, // Thay $productInfo->product_name bằng tên trường chứa tên sản phẩm trong bảng Product
                'quantity' => $product['totalQuantity']
            ];
        }
    }
    $threshold = 5; // Ngưỡng số lượng tồn kho

    $productsRunningLow = Products::find()
        ->where(['<', 'product_quantity', $threshold])
        ->orderBy(['product_quantity' => SORT_ASC])
        ->all();
    return $this->render('revenue', [
        'totalRevenue' => $totalRevenue,
        'productsInfo' => $productsInfo,
        'productsRunningLow' =>$productsRunningLow,
    ]);
}


public function actionUpdatecart($item_id, $quantity)
{
    // Tìm kiếm sản phẩm trong giỏ hàng dựa trên $item_id
    $cartItem = OrderDetails::findOne($item_id);

    // Lấy thông tin đơn hàng cuối cùng của người dùng
    $latestOrder = Orders::find()
        ->where(['user_id' => Yii::$app->user->id])
        ->orderBy(['order_id' => SORT_DESC])
        ->one();

    // Kiểm tra xem có sản phẩm nào được tìm thấy hay không
    if ($cartItem !== null && $latestOrder !== null) {
        // Kiểm tra xem sản phẩm thuộc đơn hàng hiện tại không
        if ($cartItem->order_id === $latestOrder->order_id) {
            // Cập nhật số lượng sản phẩm
            $cartItem->quantity = $quantity;
            $cartItem->total = $cartItem->product->product_price * $quantity;
            $cartItem->save();

            Yii::$app->session->setFlash('success', 'Số lượng sản phẩm đã được cập nhật.');
        } else {
            Yii::$app->session->setFlash('error', 'Sản phẩm không thuộc đơn hàng hiện tại.');
        }
    } else {
        // Nếu không tìm thấy sản phẩm hoặc đơn hàng, thông báo lỗi
        Yii::$app->session->setFlash('error', 'Không thể tìm thấy sản phẩm hoặc đơn hàng.');
    }

    // Hiển thị trang home với thông tin giỏ hàng cập nhật
    return $this->render('home', [
        'cartItems' => OrderDetails::find()->where(['order_id' => $latestOrder->order_id, 'status' => 1])->all(),
        'totalAmount' => $this->calculateTotalAmount($latestOrder->order_id),
    ]);
}

// Hàm tính tổng tiền giỏ hàng
private function calculateTotalAmount($order_id)
{
    $totalAmount = 0;
    $cartItems = OrderDetails::find()->where(['order_id' => $order_id, 'status' => 1])->all();

    foreach ($cartItems as $item) {
        $totalAmount += $item->quantity * $item->product->product_price;
    }

    return $totalAmount;
}
}