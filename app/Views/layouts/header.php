<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Search Lawyers</title>
    <link rel="icon" href="<?= base_url() ?>public/assets/images/icon.png" type="image/gif" sizes="16x16">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="Search Lawyers" name="description" />
    <meta content="" name="keywords" />
    <meta content="Dcode Materials" name="author" />
    
    <!-- CSS Files
    ================================================== -->
    <link id="bootstrap" href="<?= base_url() ?>public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-grid" href="<?= base_url() ?>public/assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />
    <link id="bootstrap-reboot" href="<?= base_url() ?>public/assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/owl.carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/owl.theme.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/owl.transitions.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/magnific-popup.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/jquery.countdown.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- color scheme -->
    <link id="colors" href="<?= base_url() ?>public/assets/css/scheme-01.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>public/assets/css/coloring.css" rel="stylesheet" type="text/css" />
    <style>
        .badge{
            background-color: #eaa636;
            font-size: 12px;
        }
        #mainmenu>li.menu-item-has-children>ul>li.menu-item-has-children>a:after {
            content: "\f105"; /* Dropdown icon for sub-sub menu */
            font-family: "FontAwesome";
            display: inline-block;
            position: absolute;
            right: 10px;
            color: rgba(0, 0, 0, 0.69);
            font-size: 18px;
        }
        #mainmenu>li.menu-item-has-children>ul>li.menu-item-has-children:hover>a:after {
            color: white; /* Change icon color to white on hover */
        }
        @media screen and (max-width: 992px) {
            #mainmenu>li.menu-item-has-children>ul>li.menu-item-has-children>a:after {
                content: ""; /* Remove icon */
            }
            @media only screen and (max-width: 992px) {
                header.header-mobile #mainmenu{
                    height: auto;
                    min-height: auto;
                    max-height: 500px;
                    overflow-y: scroll;
                    position: relative;
                    left: 0;
                }
                header.header-mobile #mainmenu::-webkit-scrollbar {
                    width: 5px; 
                }
                /* header.header-mobile #mainmenu li span.active + ul {
                    height: auto;
                    min-height: auto;
                    max-height: 500px;
                    overflow-y: scroll;
                    position: relative;
                    left: 0;
                } */
            }

        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="topbar" class="topbar-noborder">
            <div class="container">
                <div class="topbar-left sm-hide">
                    <span class="topbar-widget tb-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </span>
                </div>
                <div class="topbar-right">
                    <div class="topbar-right">
                        <span class="topbar-widget"><a href="#">Privacy policy</a></span>
                        <span class="topbar-widget"><a href="#">Request Quote</a></span>
                        <span class="topbar-widget"><a href="#">FAQ</a></span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- header begin -->
        <header class="header-light">
            <div class="container-fluid px-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <!-- logo begin -->
                                <div id="logo">
                                    <a href="<?= base_url() ?>">
                                        <img alt="" class="logo" src="<?= base_url() ?>public/assets/images/logo-light.png" />
                                        <img alt="" class="logo-2" src="<?= base_url() ?>public/assets/images/logo.png" />
                                    </a>
                                </div>
                                <!-- logo close -->
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <!-- mainmenu begin -->
                                <ul id="mainmenu">
                                    <li><a href="javascript:void(0)"><label class="badge">Consult an Expert</label></a>
                                        <ul>
                                            <li><a href="<?= base_url() ?>">Talk to a Lawyer</a></li>
                                            <li><a href="<?= base_url() ?>">Talk to a Chartered Accountant</a></li>
                                            <li><a href="<?= base_url() ?>">Talk to a Company Secretary</a></li>
                                            <li><a href="<?= base_url() ?>">Talk to a IP/Trademark Lawyer</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Business Setup</a>
                                        <ul>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Business Registration</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">US Incorporation</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Business Registration</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">US Incorporation</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Tax & Compliance</a>
                                        <ul>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">GST & Other Indirect Tax</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">GST Registration</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Trademark & IP</a>
                                        <ul>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Trademark</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">Trademark Registration</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)">Documentation</a>
                                        <ul>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Business Contract</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">Franchise Agreement</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li><a href="contact.html">Contact</a></li> -->
                                    <li><a href="javascript:void(0)">Others</a>
                                        <ul>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Fundraising</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">Fundraising</a></li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="javascript:void(0)">Company</a>
                                                <ul>
                                                    <li><a href="<?= base_url() ?>">About Us</a></li>
                                                    <li><a href="<?= base_url() ?>">Latest News</a></li>
                                                    <li><a href="<?= base_url() ?>">Contact Us</a></li>
                                                    <li><a href="<?= base_url() ?>">Media</a></li>
                                                    <li><a href="<?= base_url() ?>">Career</a></li>
                                                    <li><a href="<?= base_url() ?>">Partner with Us</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- mainmenu close -->
                            </div>
                            <div class="de-flex-col">
                                <div class="h-phone md-hide"><span>Need&nbsp;Help?</span><i class="fa fa-phone"></i> 1 200 300 9000</div>
                                <span id="menu-btn"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
         <!-- content begin -->
        <div class="no-bottom no-top" id="content">
        <div id="top"></div>