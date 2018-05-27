<?php 
session_start();

$_SESSION['menuHeader'] = 'studentAchievement';
include_once 'layout/header.php';
?>

<!-- BEGIN: PAGE CONTAINER -->
        <div class="c-layout-page">
            <!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
            <div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url(assets/base/img/content/backgrounds/bg-96.jpg)">
                <div class="container">
                    <div class="c-page-title c-pull-left">
                        <h3 class="c-font-uppercase c-font-bold c-font-dark c-font-20 c-font-slim">Lightbox Gallery</h3>
                        <h4 class="c-font-dark c-font-slim"> Page Sub Title Goes Here </h4>
                    </div>
                    <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                        <li>
                            <a href="#" class="c-font-dark">Pages</a>
                        </li>
                        <li class="c-font-dark">/</li>
                        <li>
                            <a href="page-lightbox-gallery.html" class="c-font-dark">Lightbox Gallery</a>
                        </li>
                        <li class="c-font-dark">/</li>
                        <li class="c-state_active c-font-dark">Jango Components</li>
                    </ul>
                </div>
            </div>
            <!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-3 -->
            <!-- BEGIN: PAGE CONTENT -->
            <div class="c-content-box c-size-md">
                <div class="container">
                    <div class="cbp-panel">
                        <div id="filters-container" class="cbp-l-filters-dropdown">
                            <div class="cbp-l-filters-dropdownWrap">
                                <div class="cbp-l-filters-dropdownHeader">Sort Gallery</div>
                                <div class="cbp-l-filters-dropdownList">
                                    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All (
                                        <div class="cbp-filter-counter"></div> items) </div>
                                    <div data-filter=".print" class="cbp-filter-item"> Print (
                                        <div class="cbp-filter-counter"></div> items) </div>
                                    <div data-filter=".web-design" class="cbp-filter-item"> Web Design (
                                        <div class="cbp-filter-counter"></div> items) </div>
                                    <div data-filter=".motion" class="cbp-filter-item"> Motion (
                                        <div class="cbp-filter-counter"></div> items) </div>
                                </div>
                            </div>
                        </div>
                        <div id="grid-container" class="cbp">
                            <div class="cbp-item print motion">
                                <a href="ajax/lightbox-gallery/project1.html" class="cbp-caption cbp-singlePageInline" data-title="World Clock Widget<br>by Paul Flavius Nechita">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/015.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">World Clock Widget</div>
                                                <div class="cbp-l-caption-desc">by Paul Flavius Nechita</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design">
                                <a href="ajax/lightbox-gallery/project2.html" class="cbp-caption cbp-singlePageInline" data-title="Bolt UI<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/016.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Bolt UI</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item print motion">
                                <a href="ajax/lightbox-gallery/project3.html" class="cbp-caption cbp-singlePageInline" data-title="WhereTO App<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/06.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">WhereTO App</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design print">
                                <a href="ajax/lightbox-gallery/project4.html" class="cbp-caption cbp-singlePageInline" data-title="iDevices<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/08.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">iDevices</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item motion">
                                <a href="ajax/lightbox-gallery/project5.html" class="cbp-caption cbp-singlePageInline" data-title="Seemple* Music for iPad<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/013.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Seemple* Music for iPad</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item print motion">
                                <a href="ajax/lightbox-gallery/project6.html" class="cbp-caption cbp-singlePageInline" data-title="Remind~Me Widget<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/61.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Remind~Me Widget</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item web-design print">
                                <a href="ajax/lightbox-gallery/project7.html" class="cbp-caption cbp-singlePageInline" data-title="Workout Buddy<br>by Tiberiu Neamu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/64.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Workout Buddy</div>
                                                <div class="cbp-l-caption-desc">by Tiberiu Neamu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item print">
                                <a href="ajax/lightbox-gallery/project8.html" class="cbp-caption cbp-singlePageInline" data-title="Digital Menu<br>by Cosmin Capitanu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/54.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Digital Menu</div>
                                                <div class="cbp-l-caption-desc">by Cosmin Capitanu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="cbp-item motion">
                                <a href="ajax/lightbox-gallery/project9.html" class="cbp-caption cbp-singlePageInline" data-title="Holiday Selector<br>by Cosmin Capitanu">
                                    <div class="cbp-caption-defaultWrap">
                                        <img src="assets/base/img/content/stock/58.jpg" alt=""> </div>
                                    <div class="cbp-caption-activeWrap">
                                        <div class="cbp-l-caption-alignLeft">
                                            <div class="cbp-l-caption-body">
                                                <div class="cbp-l-caption-title">Holiday Selector</div>
                                                <div class="cbp-l-caption-desc">by Cosmin Capitanu</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div id="loadMore-container" class="cbp-l-loadMore-button c-margin-t-60">
                            <a href="ajax/lightbox-gallery/load-more.html" class="cbp-l-loadMore-link btn c-btn-square c-btn-border-2x c-btn-dark c-btn-bold c-btn-uppercase">
                                <span class="cbp-l-loadMore-defaultText">LOAD MORE</span>
                                <span class="cbp-l-loadMore-loadingText">LOADING...</span>
                                <span class="cbp-l-loadMore-noMoreLoading">NO MORE WORKS</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: PAGE CONTENT -->
        </div>
        <!-- END: PAGE CONTAINER -->

<?php
include_once 'layout/footer.php'; 
?>