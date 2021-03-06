
<?php //die('index template'); ?>

<!DOCTYPE html>
<html lang="en" ng-app="BlurAdmin">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blur Admin</title>

  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>

  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/admin/assets/img/favicon-16x16.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/admin/assets/img/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('public/admin/assets/img/favicon-96x96.png') }}">

  <!-- build:css({.tmp/serve,src}) styles/vendor.css -->
  <!-- bower:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/lib/ionicons.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/angular-toastr.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/animate.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/bootstrap.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/bootstrap-select.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/bootstrap-switch.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/bootstrap-tagsinput.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/font-awesome.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/fullcalendar.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/leaflet.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/angular-progress-button-styles.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/angular-chart.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/chartist.min.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/morris.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/ion.rangeSlider.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/ion.rangeSlider.skinFlat.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/textAngular.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/xeditable.css') }}" >
  <link rel="stylesheet" href="{{ asset('public/admin/lib/style.css') }}" >
  <!-- endbower -->
  <!-- endbuild -->

  <!-- build:css({.tmp/serve,src}) styles/app.css -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/admin/app/main.css') }} ">
  <!-- endinject -->
  <!-- endbuild -->
</head>
<body>
<div class="body-bg"></div>
<main ng-if="$pageFinishedLoading" ng-class="{ 'menu-collapsed': $baSidebarService.isMenuCollapsed() }">

  <ba-sidebar></ba-sidebar>
  <page-top></page-top>

  <div class="al-main">
    <div class="al-content">
      <content-top></content-top>
      <div ui-view></div>
    </div>
  </div>

  <footer class="al-footer clearfix">
    <div class="al-footer-right">Created with <i class="ion-heart"></i></div>
    <div class="al-footer-main clearfix">
      <div class="al-copy">Blur Admin 2016</div>
      <ul class="al-share clearfix">
        <li><i class="socicon socicon-facebook"></i></li>
        <li><i class="socicon socicon-twitter"></i></li>
        <li><i class="socicon socicon-google"></i></li>
        <li><i class="socicon socicon-github"></i></li>
      </ul>
    </div>
  </footer>

  <back-top></back-top>
</main>

<div id="preloader" ng-show="!$pageFinishedLoading">
  <div></div>
</div>


<script type="text/javascript">
  //var adminPath="{{asset('admin')}}"; 
</script>
<!-- build:js(src) scripts/vendor.js -->
<!-- bower:js -->

<script src=" {{ asset('public/admin/lib/angular.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-route.js') }}"></script>


 <script src=" {{ asset('public/admin/app/app.js')}}"></script>

<script src=" {{ asset('public/admin/lib/jquery.js') }}"></script>
<script src=" {{ asset('public/admin/lib/Chart.js') }}"></script>
<script src=" {{ asset('public/admin/lib/amcharts.js') }}"></script>
<script src=" {{ asset('public/admin/lib/responsive.min.js') }}"></script>
<script src=" {{ asset('public/admin/lib/serial.js') }}"></script>
<script src=" {{ asset('public/admin/lib/funnel.js') }}"></script>
<script src=" {{ asset('public/admin/lib/pie.js') }}"></script>
<script src=" {{ asset('public/admin/lib/gantt.js') }}"></script>
<script src=" {{ asset('public/admin/lib/amstock.js') }}"></script>
<script src=" {{ asset('public/admin/lib/ammap.js') }}"></script>
<script src=" {{ asset('public/admin/lib/worldLow.js') }}"></script>


<script src=" {{ asset('public/admin/lib/jquery.slimscroll.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-slimscroll.js') }}"></script>
<script src=" {{ asset('public/admin/lib/smart-table.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-toastr.tpls.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-touch.js') }}"></script>
<script src=" {{ asset('public/admin/lib/jquery-ui.js') }}"></script>
<script src=" {{ asset('public/admin/lib/sortable.js') }}"></script>
<script src=" {{ asset('public/admin/lib/dropdown.js') }}"></script>
<script src=" {{ asset('public/admin/lib/bootstrap-select.js') }}"></script>
<script src=" {{ asset('public/admin/lib/bootstrap-switch.js') }}"></script>
<script src=" {{ asset('public/admin/lib/bootstrap-tagsinput.js') }}"></script>
<script src=" {{ asset('public/admin/lib/moment.js') }}"></script>
<script src=" {{ asset('public/admin/lib/fullcalendar.js') }}"></script>
<script src=" {{ asset('public/admin/lib/jquery.easing.js') }}"></script>
<script src=" {{ asset('public/admin/lib/jquery.easypiechart.js') }}"></script>
<script src=" {{ asset('public/admin/lib/leaflet-src.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-progress-button-styles.min.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-ui-router.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-chart.js') }}"></script>
<script src=" {{ asset('public/admin/lib/chartist.min.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-chartist.js') }}"></script>
<script src=" {{ asset('public/admin/lib/raphael.js') }}"></script>
<script src=" {{ asset('public/admin/lib/mocha.js') }}"></script>
<script src=" {{ asset('public/admin/lib/morris.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-morris-chart.min.js') }}"></script>
<script src=" {{ asset('public/admin/lib/ion.rangeSlider.js') }}"></script>
<script src=" {{ asset('public/admin/lib/ui-bootstrap-tpls.js') }}"></script>
<script src=" {{ asset('public/admin/lib/angular-animate.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-core.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-classapplier.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-highlighter.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-selectionsaverestore.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-serializer.js') }}"></script>
<script src=" {{ asset('public/admin/lib/rangy-textrange.js') }}"></script>
<script src=" {{ asset('public/admin/lib/textAngular.js') }}"></script>
<script src=" {{ asset('public/admin/lib/textAngular-sanitize.js') }}"></script>
<script src=" {{ asset('public/admin/lib/textAngularSetup.js') }}"></script>
<script src=" {{ asset('public/admin/lib/xeditable.js') }}"></script>
<script src=" {{ asset('public/admin/lib/jstree.js') }}"></script>
<script src=" {{ asset('public/admin/lib/ngJsTree.js') }}"></script>



<!-- endbower -->
<!-- endbuild -->

{{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
 --}}

<!-- build:js({.tmp/serve,.tmp/partials,src}) scripts/app.js -->
<!-- inject:js -->



<script src=" {{ asset('public/admin/app/pages/pages.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/theme.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/charts.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/components.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/dashboard.module.js')}} "></script> 
<script src=" {{ asset('public/admin/app/pages/form/form.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/maps/maps.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/profile/profile.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/tables/tables.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/ui.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/components.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/amCharts.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartJs/chartJs.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartist/chartist.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/morris/morris.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/timeline/timeline.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/mail.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/tree/tree.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/alerts/alerts.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/buttons/buttons.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/grid/grid.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/icons/icons.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/modals/modals.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/notifications/notifications.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/panels/panels.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/progressBars/progressBars.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/slider/slider.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/tabs/tabs.module.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/typography/typography.module.js')}} "></script>

<script src=" {{ asset('public/admin/app/theme/theme.config.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/theme.configProvider.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/theme.constants.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/theme.run.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/theme.service.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/profile/ProfileModalCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/profile/ProfilePageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/tables/TablesPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/toastrLibConfig.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/animatedChange.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/autoExpand.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/autoFocus.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/includeWithScope.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/ionSlider.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/ngFileSelect.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/scrollPosition.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/trackWidth.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/directives/zoomIn.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/services/baUtil.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/services/fileReader.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/services/preloader.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/services/stopableInterval.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartJs/chartJs1DCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartJs/chartJs2DCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartJs/chartJsWaveCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/chartist/chartistCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/morris/morrisCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/timeline/TimelineCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/MailTabCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/mailMessages.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/tree/treeCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/blurFeed/BlurFeedCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/blurFeed/blurFeed.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/calendar/dashboardCalendar.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardCalendar/DashboardCalendarCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardCalendar/dashboardCalendar.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardLineChart/DashboardLineChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardLineChart/dashboardLineChart.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardMap/DashboardMapCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardMap/dashboardMap.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardPieChart/DashboardPieChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardPieChart/dashboardPieChart.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardTodo/DashboardTodoCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/dashboardTodo/dashboardTodo.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/pieCharts/dashboardPieChart.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/popularApp/popularApp.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/trafficChart/TrafficChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/trafficChart/trafficChart.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/weather/WeatherCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/dashboard/weather/weather.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/wizard/wizrdCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/maps/google-maps/GmapPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/maps/leaflet/LeafletPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/maps/map-bubbles/MapBubblePageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/maps/map-lines/MapLinesPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/buttons/ButtonPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/icons/IconsPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/modals/ModalsPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/notifications/NotificationsPageCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baPanel/baPanel.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baPanel/baPanel.service.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baPanel/baPanelBlur.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baPanel/baPanelBlurHelper.service.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baPanel/baPanelSelf.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baSidebar/BaSidebarCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baSidebar/baSidebar.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baSidebar/baSidebar.service.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baSidebar/baSidebarHelpers.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baWizard/baWizard.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baWizard/baWizardCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/baWizard/baWizardStep.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/backTop/backTop.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/contentTop/contentTop.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/msgCenter/MsgCenterCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/msgCenter/msgCenter.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/pageTop/pageTop.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/widgets/widgets.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/filters/image/appImage.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/filters/image/kameleonImg.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/filters/image/profilePicture.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/filters/text/removeHtml.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/areaChart/AreaChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/barChart/BarChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/combinedChart/combinedChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/funnelChart/FunnelChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/ganttChart/ganttChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/lineChart/LineChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/charts/amCharts/pieChart/PieChartCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/composeBox/composeBoxCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/composeBox/composeModal.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/detail/MailDetailCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/components/mail/list/MailListCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/ui/modals/notifications/NotificationsCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/theme/components/backTop/lib/jquery.backTop.min.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/inputs/widgets/select/SelectpickerPanelCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/inputs/widgets/select/selectpicker.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/inputs/widgets/switch/SwitchPanelCtrl.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/inputs/widgets/switch/switch.directive.js')}} "></script>
<script src=" {{ asset('public/admin/app/pages/form/inputs/widgets/tagsInput/tagsInput.directive.js')}} "></script>



<!-- endinject -->

<!-- inject:partials -->
<!-- angular templates will be automatically converted in js and inserted here -->
<!-- endinject -->
<!-- endbuild -->

</body>
</html>