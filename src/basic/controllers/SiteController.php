<?php

namespace app\controllers;
use yii\base\Model;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Products;
use app\models\ResetPasswordForm;
use app\models\Account;
use app\models\Categories;
use yii\data\Pagination;
use app\models\OrderDetails;
use app\models\Orders;
use app\models\ProductsSearch;
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Lấy dữ liệu sản phẩm từ cơ sở dữ liệu
        $products = Products::find()->all();
    
        // Lấy dữ liệu sản phẩm với phân trang
        $query = Products::find();
    
        $pagination = new Pagination([
            'defaultPageSize' => 16, // Số sản phẩm hiển thị trên mỗi trang
            'totalCount' => $query->count(),
        ]);
  

        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
    //test
    //test
    $categories = Categories::find()->all();
    // Lọc sản phẩm theo danh mục được chọn nếu có
    $categoryId = Yii::$app->request->get('category');
    $productsQuery = Products::find();
    if ($categoryId) {
        $productsQuery->andWhere(['cate_id' => $categoryId]);
    }
    
    $product = $productsQuery->all(); // Lấy danh sách sản phẩm

        return $this->render('index', [
            'products' => $products, // Truyền danh sách sản phẩm vào view
            'pagination' => $pagination,
            'categories' => $categories,
            'product' =>$product,
           
        ]);
    }
    

    public function actionAbout()
    {
        
        $yourContent = $this->renderPartial('index');
    
        return $this->render('about', [
            'content' => $yourContent,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login_layout';
        //if (!Yii::$app->user->isGuest) {
        //    return $this->goHome();
       // }

      //  $model = new LoginForm();
      //  if ($model->load(Yii::$app->request->post()) && $model->login()) {
      //      return $this->goBack();
      //  }

       // $model->password = '';
       // return $this->render('login', [
       //     'model' => $model,
       // ]);

       if (!Yii::$app->user->isGuest) {
        return $this->goHome();
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        $user = Yii::$app->user->getIdentity();
        Yii::$app->session->set('latestLoginId', Yii::$app->user->id);

        $role = $user->role;

        if ($role == 0) {
         
           
            return $this->redirect(['site/home']);
            
        } else {
          
            return $this->goHome();
        }
    }

    $model->password = '';
    return $this->render('login', [
        'model' => $model,
    ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        // Lấy thông tin đơn hàng cuối cùng
        $latestOrder = OrderDetails::find()
            ->orderBy(['order_id' => SORT_DESC])
            ->one();

        if ($latestOrder) {
            $latestOrderId = $latestOrder->order_id;

            // Lấy các chi tiết của đơn hàng cuối cùng chưa hoàn thành
            $unfinishedOrders = OrderDetails::find()
                ->where(['order_id' => $latestOrderId])
                ->andWhere(['<>', 'status', 0])
                ->all();

            // Đặt trạng thái của các đơn hàng chưa hoàn thành về 0
            foreach ($unfinishedOrders as $order) {
                $order->status = 0;
                $order->save(false); // Bỏ qua việc xác nhận thông tin khi lưu để tránh việc xác nhận lỗi
            }
        }
     // Lấy ID người dùng hiện tại
$userId = Yii::$app->user->id;

// Tìm đơn hàng hiện tại của người dùng
$latestOrder = Orders::find()
    ->where(['user_id' => $userId])
    ->orderBy(['order_id' => SORT_DESC])
    ->one();

    if ($latestOrder && $latestOrder->status == 2) {
    // Đặt trạng thái của đơn hàng hiện tại về 0
    $latestOrder->status = 0;
    $latestOrder->save(false); // Bỏ qua việc xác nhận thông tin khi lưu để tránh việc xác nhận lỗi
}
if ($latestOrder && empty($latestOrder->getOrderDetails()->all())) {
    // Xóa đơn hàng hiện tại
    $latestOrder->delete();
}
        // Tiến hành đăng xuất
        Yii::$app->user->logout();

        // Redirect hoặc thực hiện các hành động khác sau khi đăng xuất
        return $this->redirect(['site/index']); // Điều hướng đến trang chủ hoặc trang khác sau khi đăng xuất
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
   // public function actionAbout()
    //{
   //     return $this->render('about');
   // }
    public function actionHome()
   {
       $this->layout = 'admin_layout';
      return $this->render('home');
  }
  public function actionRegister()
  {
    $this->layout = 'login_layout';
      //$this->layout = 0;
      $post = Yii::$app->request->post();
      $user = new Account();
      if ($user->idLogged()) {
          return $this->goHome();
          
      }
     
      if(isset($post['register']) && $post['register'] == 1){
          $this->layout = 0;
          $users = new Account();
          $users->beforeSaveUser($post['Users']);
          $users->validate();
          $users->save();
          Yii::$app->session->setFlash('success', 'Đăng ký thành công!');
          return $this->redirect('login');
          
      }
      return $this->render('register');
  }
  

public function actionUpdateuser()
{
    $currentUser = Yii::$app->user->identity; // Lấy thông tin người dùng hiện tại

    if ($currentUser !== null) {
        // Tìm và sửa thông tin của người dùng hiện tại
        $model = Account::findOne($currentUser->id);

        if ($model === null) {
            throw new \yii\web\NotFoundHttpException('Không tìm thấy người dùng.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Thông tin người dùng đã được cập nhật thành công.');
            return $this->redirect(['site/index']); // Chuyển hướng về trang chủ hoặc trang cần thiết khác
        }
    } else {
        throw new \yii\web\ForbiddenHttpException('Bạn phải đăng nhập để thực hiện thao tác này.');
    }

    return $this->render('updateuser', [
        'model' => $model,
        'currentUser' => $currentUser,
    ]);
}


public function actionResetpassword()
{
    $model = new ResetPasswordForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        // Lưu dữ liệu, thay đổi mật khẩu của người dùng
        $user = Account::findOne(['username' => \Yii::$app->user->identity->username]);
        $user->password_hash = md5($model->newPassword); // Sử dụng MD5 để mã hóa mật khẩu mới
        if ($user->save()) {
            Yii::$app->session->setFlash('success', 'Mật khẩu đã được thay đổi thành công.');
            return $this->redirect(['site/index']); // Chuyển hướng về trang chủ hoặc trang cần thiết khác
        } else {
            Yii::$app->session->setFlash('error', 'Đã xảy ra lỗi khi thay đổi mật khẩu.');
        }
    }

    return $this->render('resetpassword', [
        'model' => $model,
    ]);
}

// Trong action trong controller (ví dụ: SiteController.php)
public function actionUpdateod()
{
    // Kiểm tra xem người dùng đã đăng nhập chưa
    if (Yii::$app->user->isGuest) {
        return $this->redirect(['site/login']);
    }

    // Lấy ID người dùng đăng nhập
    $userId = Yii::$app->user->id;

    // Lấy tất cả đơn hàng của người dùng với trạng thái (status) = 0
    $orders = Orders::find()->where(['user_id' => $userId])->all();

    // Hiển thị trang với thông tin đơn hàng
    return $this->render('updateod', ['orders' => $orders]);
}

// Trong actionCancelOrder trong controller của bạn
public function actionCancelOrder($id)
{
    // Tìm đơn hàng theo ID
    $order = Orders::findOne($id);

    // Kiểm tra xem đơn hàng có tồn tại không
    if ($order) {
        // Cập nhật trạng thái đơn hàng thành 3 (Hủy)
        $order->status = 3;

        // Lưu thay đổi vào cơ sở dữ liệu
        if ($order->save()) {
            // Cộng lại số lượng sản phẩm vào cơ sở dữ liệu
            foreach ($order->orderDetails as $detail) {
                $product = $detail->product;
                $product->product_quantity += $detail->quantity;
                // Lưu thay đổi vào cơ sở dữ liệu
                $product->save();
            }

            // Điều hướng người dùng đến trang hiển thị đơn hàng hoặc trang danh sách đơn hàng
            Yii::$app->session->setFlash('success', 'Hủy đơn hàng thành công!');
            return $this->redirect(['updateod', 'id' => $order->order_id]); 
        } else {
            // Xử lý lỗi khi lưu trạng thái đơn hàng
            Yii::error('Failed to update order status.');
        }
    }

    // Xử lý trường hợp đơn hàng không tồn tại
    Yii::warning('Order not found.');

    // Điều hướng người dùng đến trang danh sách đơn hàng hoặc trang khác tùy bạn
    return $this->redirect(['site/index']);
}


public function actionHouse($item_id)
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
    return $this->render('house', [
        'cartItems' => OrderDetails::find()->where(['order_id' => $latestOrder->order_id, 'status' => 1])->all(),
        'totalAmount' => $totalAmount,
    ]);
}

}