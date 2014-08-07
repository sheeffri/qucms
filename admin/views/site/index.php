<?php $this->params['breadcrumbs'] = ['Рабочий стол'] ?>

<?php
//namespace siasoft\qucms\widgets;

//use siasoft\qucms\widgets\RealEstateSearchFrom;

//echo \siasoft\qucms\widgets\RealEstateSearchFrom::widget();


?>

<?php require(__DIR__ . '/../../../public_html/tempViews/realEstateSearchPanel.php'); ?>
<!-- widget grid -->
<section id="widget-grid" class="">
    <!-- Widget ID (each widget will need unique ID)-->
    <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-001" data-widget-editbutton="false">
        <!-- widget options:
        usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

        data-widget-colorbutton="false"
        data-widget-editbutton="false"
        data-widget-togglebutton="false"
        data-widget-deletebutton="false"
        data-widget-fullscreenbutton="false"
        data-widget-custombutton="false"
        data-widget-collapsed="true"
        data-widget-sortable="false"

        -->
        <style>
            .tab-content {
                background: #fff;
            }
            .active-table-cell-for-preview {
                background: none repeat scroll 0 0 #3276b1;
                color: white;
                font-style: italic;
            }

        </style>
        <header>
            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
            <h2>Недвижимость</h2>

        </header>

        <!-- widget div-->
        <div>

            <!-- widget edit box -->
            <div class="jarviswidget-editbox">
                <!-- This area used as dropdown edit box -->

            </div>
            <!-- end widget edit box -->

            <!-- widget content -->
            <div class="widget-body no-padding">

                <table id="search_result_table" class="table table-bordered smart-form">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th></th>
                            <th>Объект</th>
                            <th>Сделка</th>
                            <th>Адрес</th>
                            <th>Планировка</th>
                            <th>Площадь</th>
                            <th>Этаж</th>
                            <th>Цена</th>
                            <th>Состояние</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr class="">
                            <td>1</td>
                            <td><i class="fa  fa-camera "></i></td>
                            <td>Квартира</td>
                            <td>Продажа</td>
                            <td>Сургут, Каролинского 12</td>
                            <td>Индивидуальная</td>
                            <td>109.2 м&sup2;</td>
                            <td>12/16</td>
                            <td>1.200.000 <i class="fa fa-ruble"></i></td>
                            <td>Черновая отделка</td>
                        </tr>
                        <tr class="active-table-cell-for-preview">
                            <td>1</td>
                            <td><i class="fa  fa-camera "></i></td>
                            <td>Квартира</td>
                            <td>Продажа</td>
                            <td>Сургут, Каролинского 12</td>
                            <td>Индивидуальная</td>
                            <td>109.2 м&sup2;</td>
                            <td>12/16</td>
                            <td>1.200.000 <i class="fa fa-ruble"></i></td>
                            <td>Черновая отделка</td>

                        </tr>
                        <tr class="more-details-in-table well">
                            <td colspan="10">
                                <div class="jarviswidget-color-blueLight ">
                                    <ul class="nav nav-tabs bordered dark-grey" id="myTab1">
                                        <li class="active">
                                            <a data-toggle="tab" href="#ss1"><i class="fa fa-fw fa-lg fa-building "></i> Характеристики объекта</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#ss2"><i class="fa fa-fw fa-lg  fa-camera "></i> Фотографии</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#ss3"><i class="fa fa-fw fa-lg fa-map-marker "></i> На карте</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content padding-10" id="myTabContent1">
                                        <div id="ss1" class="tab-pane fade in active">
                                            <div class="clearfix" style="margin-bottom:10px;">
                                                <div class="col-md-8">
                                                    <h1 style="margin-bottom:5px;">2-х комнатная квартира в Сургут, Каролинского 14/1, 104</h1>

                                                    <p class="lead">Отличная квартира в центре города. Развитая районная инфраструктура. Есть детские сады и школы. Полземный паркинг и выход к морю.</p>    
                                                </div>
                                                <div class="col-md-4">
                                                    <h2 class="txt-color-red text-right"><span class="semi-bold">Цена:</span> 2.200.300 <i class="fa fa-ruble"></i></h2>
                                                </div>
                                            </div>

                                            <div class="row padding-10">
                                                <div class="col-md-4">
                                                    <img style="max-width:100%;" src="img/superbox/superbox-full-6.jpg" />
                                                </div>
                                                <div class="col-md-4">

                                                    <dl class="dl-horizontal">
                                                        <dt>Площадь общая</dt>
                                                        <dd>109.2 м&sup2;</dd>
                                                        <dt>Площадь жилпая</dt>
                                                        <dd>89 м&sup2;</dd>
                                                        <dt>Площадь кухни</dt>
                                                        <dd>14 м&sup2;</dd>
                                                        <dt>Площадь балконов</dt>
                                                        <dd>22 м&sup2;</dd>
                                                    </dl>
                                                    <hr class="simple" />
                                                    <dl class="dl-horizontal">

                                                        <dt>Проект</dt>
                                                        <dd><a href="#">Индивидуальный</a></dd>

                                                        <dt>Этаж/этажность</dt>
                                                        <dd>9/19</dd>

                                                        <dt>Состояние</dt>
                                                        <dd>требует ремонта</dd>

                                                        <dt>Форма собственности</dt>
                                                        <dd>требуется приватизация</dd>



                                                        <dt>Тип санузла</dt>
                                                        <dd>совмещен</dd>

                                                        <dt>Материал здания</dt>
                                                        <dd>монолит + керамзит</dd>

                                                        <dt>Количество балконов</dt>
                                                        <dd>2</dd>

                                                    </dl>

                                                </div>
                                                <div class="col-md-4">

                                                    <dl class="dl-horizontal">

                                                        <dt>Источник</dt>
                                                        <dd>Звонок в агентство</dd>

                                                        <dt>Агент</dt>
                                                        <dd><a href="#">Стрельцов Иван</a></dd>


                                                        <dt>Договор</dt>
                                                        <dd><a href="#">№12 от 12.12.2014</a></dd>

                                                    </dl>
                                                </div>
                                            </div>

                                            <div class="btn-group">
                                                <button class="btn btn-primary">
                                                    Drop Down
                                                </button>
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="javascript:void(0);">Action</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Another action</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);">Something else here</a>
                                                    </li>
                                                    <li class="divider"></li>
                                                    <li>
                                                        <a href="javascript:void(0);">Separated link</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                        <div id="ss2" class="tab-pane fade">
                                            <!-- SuperBox -->

                                            <div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-1.jpg" data-img="img/superbox/superbox-full-1.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Miller Cine" class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-2.jpg" data-img="img/superbox/superbox-full-2.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Bridge of Edgen" class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-3.jpg" data-img="img/superbox/superbox-full-3.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Lines of Friendship" class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-4.jpg" data-img="img/superbox/superbox-full-4.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="My new car!" class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-5.jpg" data-img="img/superbox/superbox-full-5.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Study Time" class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-6.jpg" data-img="img/superbox/superbox-full-6.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="San Francisco Bridge"  class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-7.jpg" data-img="img/superbox/superbox-full-7.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="New Styla"  class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-8.jpg" data-img="img/superbox/superbox-full-8.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Cristpta"  class="superbox-img">
                                            </div><!--
                                            --><div class="superbox-list">
                                                <img src="img/superbox/superbox-thumb-9.jpg" data-img="img/superbox/superbox-full-9.jpg" alt="My first photoshop layer mask on a high end PSD template theme" title="Cristine Dine"  class="superbox-img">
                                            </div><!--
                                            -->
                                            <div class="superbox-float"></div>

                                            <!-- /SuperBox -->
                                        </div>
                                        <div id="ss3" class="tab-pane fade">
                                            <p>
                                                Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr class="odd gradeX">
                            <td>1</td>
                            <td><i class="fa  fa-camera "></i></td>
                            <td>Квартира</td>
                            <td>Продажа</td>
                            <td>Сургут, Каролинского 12</td>
                            <td>Индивидуальная</td>
                            <td>109.2 м&sup2;</td>
                            <td>12/16</td>
                            <td>1.200.000 <i class="fa fa-ruble"></i></td>
                            <td>Черновая отделка</td>
                        </tr>
                        <tr class="odd gradeX warning">
                            <td>1</td>
                            <td><i class="fa  fa-camera "></i></td>
                            <td>Квартира</td>
                            <td>Продажа</td>
                            <td>Сургут, Каролинского 12</td>
                            <td>Индивидуальная</td>
                            <td>109.2 м&sup2;</td>
                            <td>12/16</td>
                            <td>1.200.000 <i class="fa fa-ruble"></i></td>
                            <td>Черновая отделка</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- end widget content -->

        </div>
        <!-- end widget div -->

    </div>
    <!-- end widget -->
</section>