<!-- new widget -->
<div class="jarviswidget" id="wid-id-0" data-widget-togglebutton="false" data-widget-editbutton="false" data-widget-fullscreenbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
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
    <header>
        <span class="widget-icon"> <i class="glyphicon glyphicon-search txt-color-darken"></i> </span>
        <h2>Поиск </h2>

        <ul class="nav nav-tabs pull-right in" id="myTab">
            <li class="active">
                <a data-toggle="tab" href="#s1"><i class="fa fa-building "></i> <span class="hidden-mobile hidden-tablet">Недвижимость</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#s2"><i class="fa fa-group "></i> <span class="hidden-mobile hidden-tablet">Клиенты</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#s3"><i class="fa  fa-map-marker "></i> <span class="hidden-mobile hidden-tablet">По карте</span></a>
            </li>

            <li>
                <a data-toggle="tab" href="#s4"><i class="fa fa-star "></i> <span class="hidden-mobile hidden-tablet">Избранное</span></a>
            </li>
        </ul>

    </header>

    <!-- widget div-->
    <div class="no-padding">
        <!-- widget edit box -->
        <div class="jarviswidget-editbox">

            test
        </div>
        <!-- end widget edit box -->

        <div class="widget-body no-padding-bottom ">
            <!-- content -->

            <div id="myTabContent" class="tab-content">
                <!--Поиск недвижимости--> 
                <div class="tab-pane fade active in no-padding-bottom" id="s1">
                    <form novalidate="novalidate" class="smart-form" id="checkout-form">

                        <fieldset>
                            <div class="row">


                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" value="" placeholder="Цена от" name="city">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" value="" placeholder="до" name="city">
                                    </label>
                                </section>
                                <label class="label col col-2">Количество комнат:</label>
                                <section class="col col-4">

                                    <!--<label class="label">Количество комнат</label>-->
                                    <div class="inline-group">
                                        <label class="checkbox">
                                            <input type="checkbox"  name="radio-inline">
                                            <i></i>1</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="radio-inline">
                                            <i></i>2</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="radio-inline">
                                            <i></i>3</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="radio-inline">
                                            <i></i>4</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="radio-inline">
                                            <i></i>5+</label>
                                    </div>

                                </section>
                            </div> 

                            <div class="row ">
                                <section class="col col-3">
                                    <label class="input"> <i class="icon-prepend fa fa-building"></i>
                                        <input  type="text" placeholder="ID" name="fname">
                                    </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="month">
                                            <option disabled="" selected="" value="0">Тип недвижимости</option>
                                            <option value="1">Кваритира</option>
                                            <option value="1">Дом</option>              
                                        </select> <i></i> </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="month">
                                            <option disabled="" selected="" value="0">Тип сделки</option>
                                            <option value="1">Купля</option>
                                            <option value="1">Продажа</option>              
                                        </select> <i></i> </label>
                                </section>
                                <section class="col col-3">
                                    <label class="select">
                                        <select name="month">
                                            <option selected="" value="0">Менеджер</option>
                                            <option value="1">Иван Стрельцов</option>
                                            <option value="1">Ктото Другой</option>              
                                        </select> <i></i> </label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-2">
                                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                        <input type="tel" data-mask="(999) 999-9999" placeholder="Телефон" name="phone">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="select">
                                        <select name="country">
                                            <option selected="" value="239">Россия</option>
                                        </select> <i></i> </label>
                                </section>

                                <section class="col col-2">
                                    <label class="input">
                                        <input type="text" value="Сургут" placeholder="Город" name="city">
                                    </label>
                                </section>

                                <section class="col col-6">
                                    <label class="input" for="address2">
                                        <input type="text" placeholder="Адрес" id="address2" name="address2">
                                    </label>
                                </section>

                            </div>                        
                        </fieldset>
                        <fieldset>



                            <section >

                                <!--<label class="label">Количество комнат</label>-->
                                <div class="inline-group">
                                    <label class="checkbox">
                                        <input type="checkbox"  name="radio-inline">
                                        <i></i>Не первый/последний этаж</label>
                                    <label class="checkbox">
                                        <input type="checkbox"  name="radio-inline">
                                        <i></i>Ипотека</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="radio-inline">
                                        <i></i>Молодая семья</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="radio-inline">
                                        <i></i>Новостройка</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="radio-inline">
                                        <i></i>Только моя недвижимость</label>

                                </div>

                            </section>

                        </fieldset>



                        <footer>

                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i> Поиск
                            </button>
                            <a class="btn btn-link" href="#">Очистить форму поиска</a>
                        </footer>
                    </form>

                </div>
                <!--Конец.Поиск недвижимости-->

                <div class="tab-pane fade" id="s2">
                    <div class="widget-body-toolbar bg-color-white no-padding">
                        <form novalidate="novalidate" class="smart-form" id="checkout-form">
                            <fieldset>
                                <div class="row">
                                    <section class="col col-3">
                                        <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                            <input type="tel" data-mask="(999) 999-9999" placeholder="Телефон" name="phone">
                                        </label>
                                    </section>
                                    <section class="col col-3">
                                        <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                            <input type="tetextl"  placeholder="ФИО" name="phone">
                                        </label>
                                    </section>

                                    <section class="col col-2">
                                        <label class="input">
                                             <i class="icon-prepend fa fa-file"></i>
                                            <input type="text"  placeholder="Договор" name="city">
                                        </label>
                                    </section>

                                    <section class="col col-2">
                                        <label class="input" for="address2">
                                            <input type="text" placeholder="Паспорт" id="address2" name="address2">
                                        </label>
                                    </section>
                                    <section  class="col col-2">

                                        <!--<label class="label">Количество комнат</label>-->
                                        <div class="inline-group">
                                            <label class="checkbox">
                                                <input type="checkbox"  name="radio-inline">
                                                <i></i>Мои клиенты</label>

                                        </div>

                                    </section>
                                </div>                        
                            </fieldset>

                            <footer>

                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i> Поиск
                                </button>
                                <a class="btn btn-link" href="#">Очистить форму поиска</a>
                            </footer>
                        </form>
                    </div>


                </div>
                <!-- end s2 tab pane -->

                <div class="tab-pane fade" id="s3">

                    <div class="widget-body-toolbar bg-color-white smart-form" id="rev-toggles">

                        <div class="inline-group">

                            <label for="gra-0" class="checkbox">
                                <input type="checkbox" name="gra-0" id="gra-0" checked="checked">
                                <i></i> Target </label>
                            <label for="gra-1" class="checkbox">
                                <input type="checkbox" name="gra-1" id="gra-1" checked="checked">
                                <i></i> Actual </label>
                            <label for="gra-2" class="checkbox">
                                <input type="checkbox" name="gra-2" id="gra-2" checked="checked">
                                <i></i> Signups </label>
                        </div>

                        <div class="btn-group hidden-phone pull-right">
                            <a class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown"><i class="fa fa-cog"></i> More <span class="caret"> </span> </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-file-text-alt"></i> Export to PDF</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);"><i class="fa fa-question-sign"></i> Help</a>
                                </li>
                            </ul>
                        </div>

                    </div>

                    <div class="padding-10">
                        <div id="flotcontainer" class="chart-large has-legend-unique"></div>
                    </div>
                </div>
                <!-- end s3 tab pane -->
            </div>

            <!-- end content -->
        </div>

    </div>
    <!-- end widget div -->
</div>
<!-- end widget -->