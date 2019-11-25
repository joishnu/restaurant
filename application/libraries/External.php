<?php defined('BASEPATH') OR exit('No direct script access allowed');

class External {
    private $CI;
    
    function __construct(){
        $this->CI = get_instance();
    }

    /********* Static Classes ***********/
    /*
      For useing this function pass 
      $data['extra_datatable_data'] = $this->external->datatable_extra_js_css();       
      this function inside the method.
    */

    public function datatable_extra_js_css(){
      return '
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net/js/jquery.dataTables.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons/js/buttons.flash.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons/js/buttons.html5.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons/js/buttons.print.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/jszip/dist/jszip.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/pdfmake/build/pdfmake.min.js'.'"></script>
        <script src="'.CUSTOM_URL.'assets/vendors/pdfmake/build/vfs_fonts.js'.'"></script>   
        <link href="'.CUSTOM_URL.'assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css'.'" rel="stylesheet">
        <link href="'.CUSTOM_URL.'assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css'.'" rel="stylesheet">
        <link href="'.CUSTOM_URL.'assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css'.'" rel="stylesheet">
        <link href="'.CUSTOM_URL.'assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css'.'" rel="stylesheet">
        <link href="'.CUSTOM_URL.'assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css'.'" rel="stylesheet">    
      ';
    }

    public function validation_extra_js_css(){
      //return '<script src="'.CUSTOM_URL.'assets/vendors/validator/validator.js'.'"></script>';
    }

    public function product_js(){
      return '<script src="'.CUSTOM_URL.'assets/js/product.js'.'"></script>';
    }

    public function step_form_extra_js_css(){
    return '<script src="'.CUSTOM_URL.'assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js'.'"></script>';
  }

  public function file_upld_js_css(){
    return '<link href="'.CUSTOM_URL.'assets/others/jquery.filer-master/css/jquery.filer.css'.'" type="text/css" rel="stylesheet" />
        <link href="'.CUSTOM_URL.'assets/others/jquery.filer-master/css/themes/jquery.filer-dragdropbox-theme.css'.'" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="'.CUSTOM_URL.'assets/others/jquery.filer-master/js/jquery.filer.min.js'.'"></script>';
  }

  public function wizard(){
      return '<script src="'.CUSTOM_URL.'assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js'.'"></script>';
    }

    public function datetimepciker(){
      return '
      <script src="'.CUSTOM_URL.'assets/vendors/moment/min/moment.min.js'.'"></script>
      <script src="'.CUSTOM_URL.'assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js'.'"></script>
      <link href='.CUSTOM_URL.'assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css'.'" rel="stylesheet">
      ';
    }

    public function textarea(){
      return '
          <script src="'.CUSTOM_URL.'assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js'.'"></script>
          <script src="'.CUSTOM_URL.'assets/vendors/jquery.hotkeys/jquery.hotkeys.js'.'"></script>
          <script src="'.CUSTOM_URL.'assets/vendors/google-code-prettify/src/prettify.js'.'"></script>
      ';
    }
    public function dropdown_search(){
      return '
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      ';
    }
}



    