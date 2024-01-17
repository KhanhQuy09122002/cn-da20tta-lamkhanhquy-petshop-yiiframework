<?php

namespace app\controllers;

use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Categories; 
use app\models\OrderDetails; 
use Yii;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
use yii\web\Uploadedfile;
/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
     * Lists all Products models.
     *
     * @return string
     */
    public function actionIndex()
    {
        
        
        $this->layout = 'admin_layout';
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

      

// Các bước khác để phân trang và sắp xếp sản phẩm ở đây


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            
        ]);
      
    }

    /**
     * Displays a single Products model.
     * @param int $product_id Product ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($product_id)
    {
        $this->layout = 'admin_layout';
        return $this->render('view', [
            'model' => $this->findModel($product_id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $this->layout = 'admin_layout';
        $model = new Products();
        
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file) {
                    $uploadPath = Yii::getAlias('@webroot/images/');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
                    $fileName = time() . '_' . $model->file->baseName . '.' . $model->file->extension;
                    $filePath = $uploadPath . $fileName;
                    if($model->file->saveAs($filePath)) {
                        $model->product_image = 'images/' . $fileName;
                        $model->save(false); // Lưu model mà không kiểm tra validation nữa
                        return $this->redirect(['view', 'product_id' => $model->product_id]);
                    }
                }
            }
        } else {
            $model->loadDefaultValues();
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $product_id Product ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($product_id)
    {
        $this->layout = 'admin_layout';
        
        // Tìm model sản phẩm dựa trên product_id
        $model = $this->findModel($product_id);
    
        // Kiểm tra nếu là POST request và model có thể load dữ liệu từ POST
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $model->file = UploadedFile::getInstance($model, 'file');
    
                // Kiểm tra và xử lý tệp tin nếu tồn tại
                if ($model->file) {
                    $uploadPath = Yii::getAlias('@webroot/images/');
                    if (!file_exists($uploadPath)) {
                        mkdir($uploadPath, 0777, true);
                    }
    
                    $fileName = time() . '_' . $model->file->baseName . '.' . $model->file->extension;
                    $filePath = $uploadPath . $fileName;
    
                    if ($model->file->saveAs($filePath)) {
                        $model->product_image = 'images/' . $fileName;
                        $model->save(false); // Lưu model mà không kiểm tra validation nữa
                    }
                }
    
                return $this->redirect(['view', 'product_id' => $model->product_id]);
            }
        }
    
        // Hiển thị trang cập nhật với model và layout đã được đặt trước đó
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $product_id Product ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($product_id)
    {
        $this->layout = 'admin_layout';
        $this->findModel($product_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $product_id Product ID
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id)
    {
        if (($model = Products::findOne(['product_id' => $product_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
   
public function actionDetail($id)
{
    // Tìm sản phẩm dựa trên ID
    $product = Products::findOne($id);

    return $this->render('detail', [
        'product' => $product,
    ]);
}


public function actionShowByCategori($cate_id)
{
    // Lấy danh sách sản phẩm thuộc danh mục có $category_id
    $products = Products::find()->where(['cate_id' => $cate_id])->all();

    return $this->render('show_by_category', [
        'products' => $products,
    ]);
}


public function actionShowByCategory($cate_id)
{
    $category = Categories::findOne($cate_id);
    $query = Products::find()->where(['cate_id' => $cate_id]);
    $countQuery = clone $query;
    $pagination = new Pagination(['totalCount' => $countQuery->count(),'pageSize' => 12,]);

    $products = $query->offset($pagination->offset)
        ->limit($pagination->limit)
        ->all();

    return $this->render('show_by_category', [
        'products' => $products,
        'pagination' => $pagination,
        'category' =>$category,
    ]);
}

public function actionSearch($search)
    {
        $this->layout = 'main';
        $products = Products::find()
            ->where(['like', 'product_name', $search])
            ->all();

        // Hiển thị kết quả trên trang xem.php
        return $this->render('xem', [
            'products' => $products,
        ]);
    }

}
