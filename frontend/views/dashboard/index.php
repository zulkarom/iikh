<?php
use kartik\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Negeri;
use yii\helpers\Html;
use yii\widgets\ListView;

$dirAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/assets/ikhtiar');
?>

<section class="user-dashboard">
        <div class="container-lg">
          <div class="row g-3 g-xl-4 tab-wrap">
            <div class="col-lg-4 col-xl-3 sticky">
              <button class="setting-menu btn-solid btn-sm d-lg-none">Setting Menu <i class="arrow"></i></button>
              <div class="side-bar">
                <span class="back-side d-lg-none"> <i data-feather="x"></i></span>
                <div class="profile-box">
                  <div class="img-box">
                    <img class="img-fluid" src="<?=$dirAsset?>/images/avatar/avatar.jpg" alt="user" />
                    <div class="edit-btn">
                      <i data-feather="edit"></i>
                      <input class="updateimg" type="file" name="img" />
                    </div>
                  </div>

                  <div class="user-name">
                    <h5><?=Yii::$app->user->identity->fullname?></h5>
                    <h6><?=Yii::$app->user->identity->email?></h6>
                  </div>
                </div>

                <ul class="nav nav-tabs nav-tabs2" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">
                      Dashboard
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">
                      Orders
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                      Profile
                      <span><i data-feather="chevron-right"></i></span>
                    </button>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-lg-8 col-xl-9">
              <div class="right-content tab-content" id="myTabContent">
                <!-- User Dashboard Start -->
                <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                  <div class="dashboard-tab">
                    <div class="title-box3">
                      <h3>Selamat Kembali <?=Yii::$app->user->identity->fullname?></h3>
                      <p>
                        Welcome back <?=Yii::$app->user->identity->fullname?>, here you can customize your profile and also track your order also, you can access your saved address and card. if you want change setting you can
                        do it from here
                      </p>
                    </div>

                    <div class="row g-0 option-wrap">
                      <div class="col-sm-6 col-xl-4">
                        <a href="javascript:void(0)" data-class="orders" class="tab-box">
                          <img src="<?=$dirAsset?>/icons/svg/1.svg" alt="shopping bag" />
                          <h5>Orders</h5>
                          <p>See order history of previous orders</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="javascript:void(0)" data-class="profile" class="tab-box">
                          <img src="<?=$dirAsset?>/icons/svg/5.svg" alt="profile" />
                          <h5>Profile</h5>
                          <p>Complete your profile details there are some Information missing</p>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- User Dashboard End -->
  
                <!-- Order Tabs Start -->
                <div class="tab-pane" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                  <div class="cart-wrap order-content">
                    <div class="title-box3">
                      <h3>My Orders</h3>
                      <p>H thanks for placing a delivery order with Oslo! Your order should be home with you in soon</p>
                    </div>

                    <div class="container">        
                            <br />
                    
                    <div id="list-search" class="row">
                        <div class="col-md-12">
                        
                        
                        <!-- <div class="table-responsive"> -->
                    <?php   


                    echo $this->render('_list_order', ['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);




                    ?>


                    <!-- </div> -->





                          
                        
                        </div>
                    </div>


                    </div>
                  </div>
                </div>
                <!-- Order Tabs End -->

                  

                <!-- Profile Tabs Start -->
                <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="profile">
                    <div class="title-box3">
                      <h3>Maklumat Peribadi</h3>
                    </div>

                    <?php $form = ActiveForm::begin(['class' => 'custom-form form-pill']); ?>
                      <div class="row g-3 g-xl-4">
                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($user, 'fullname')->textInput(['id' => 'fullname', 'class' => 'form-control'])->label('Nama Penuh') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($user, 'email')->textInput(['id' => 'email', 'class' => 'form-control'])->label('Email') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'phone')->textInput(['id' => 'phone', 'class' => 'form-control', 'type'=>'number'])->label('No Telefon') ?>
                  </div>
                </div>

                <div class="col-12">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'address')->textInput(['id' => 'address', 'class' => 'form-control'])->label('Alamat') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'city')->textInput(['id' => 'city', 'class' => 'form-control'])->label('Bandar') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'zipcode')->textInput(['id' => 'zipcode', 'class' => 'form-control', 'type'=>'number'])->label('Poskod') ?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'state')->dropDownList( ArrayHelper::map(Negeri::find()->orderBy('negeri_name')->all(),'id', 'negeri_name'), ['id' => 'state', 'prompt' => 'Select State', 'class' => 'form-select form-control'])->label('Negeri');?>
                  </div>
                </div>

                <div class="col-6">
                  <div class="input-box">
                    <?= $form->field($userAddress, 'country')->dropDownList(['MY' => 'Malaysia', 'IND' => 'Indonesia'], ['id' => 'country'])->label('Negara');?>
                  </div>
                </div>

                
              </div>

                      <div class="btn-box">
                        <?= Html::submitButton('Simpan Maklumat <i class="arrow"></i>', ['class' => 'btn-solid btn-sm']) ?>
                      </div>
                    <?php ActiveForm::end(); ?>
                  </div>
                </div>
                <!-- Profile Tabs End -->

              
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Dashboard End -->
    </main>
    <!-- Main End -->