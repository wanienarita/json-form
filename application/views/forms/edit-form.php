<?= $header; ?>
<div class='row'>
    <div class='col-md-9'>
        <h4><?= $document_title; ?></h4>

        <form id='notesForm' class='form-horizontal'>
            <div class='panel panel-default'>
                
                    <?php foreach ($json_elements as $key => $section): $sectionKod=$section->section_code;?>
                        
                            <div class='panel-heading' 
                                 data-section='<?= $key; ?>' 

                                 style="background: #f5f5f5; "><?= $section->section_desc; ?>
                                <div class="btn-group pull-right">
                                    <a href="#" class="btn btn-default btn-xs editSection" data-section='<?= $key; ?>'
                                       data-sectioncode='<?= $section->section_code; ?>' 
                                       ></i> Edit Section</a>
                                    <a href="#" class="btn btn-default btn-xs expandButton" data-section='<?= $key; ?>' data-current='expend'><i class='glyphicon glyphicon-chevron-down'></i> Expand</a>
                                </div>
                            </div>
                            <div class='panel-body hidden' data-section='<?= $key; ?>'>
                                <div class='row' style='margin-bottom: 5px;'>
                                    <div class='col-sm-12 text-right'>
                                        <div class='btn btn-sm btn-default addElement' data-sectioncode='<?php echo $sectionKod; ?>'><i class='glyphicon glyphicon-plus'></i> Add Element</div>
                                    </div>
                                </div>
                               <?php $column = $section->layout;  
                               switch ($column):
                                   case '1': $set=12;
                                       
                                       ?><ol class='nested_with_switch list-unstyled'><div class="parent"><div class='row wrapper'>
                                                   <div id='sortable' >
                                <?php foreach ($section->elements as $elem => $element): $thecode=$element->element_code; 
                                if($element->element_code === $element->child_element_code){?>                                                                      
                                      <li style='margin-bottom:10px;'>
                                          <div class='col-sm-<?php echo $set; ?>'>
                                            <div class='form-group form-group-sm' style='border:1px solid #ccc; margin:4px;' draggable="true">
                                                <label class='control-label col-md-6'><?= $element->element_desc; ?></label>
                                                    <div class='col-md-2'>
                                                      <div class='btn btn-link editElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>'>Edit</div>
                                                      <div class='btn btn-link deleteElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>' data-docid='<?= $document_id; ?>' ><i class='glyphicon glyphicon-remove'></i></div>
                                                    </div>
                                                <?php  foreach ($section->elements as $elem => $element):                                
                                                 if($element->child_element_code === $thecode && $element->element_code != $element->child_element_code){?>
                                                <label class='control-label col-md-6'><?= $element->element_desc; ?></label>
                                                    <div class='col-md-2'>
                                                      <div class='btn btn-link editElement' data-elementid='<?= $element->element_code;?>'  data-sectioncode='<?php echo $sectionKod; ?>'>Edit</div>
                                                      <div class='btn btn-link deleteElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>' data-docid='<?= $document_id; ?>' ><i class='glyphicon glyphicon-remove'></i></div>
                                                    </div>
                                                 <?php }
                                             endforeach;
                                             ?>
                                            </div>
                                        </div> 
                                      </li>
                                <?php } endforeach;  ?>
                                                   </div></div></div></ol> <?php                                      
                                       break;
                                   
                                       case '2': $set=6; ?><div class="parent"><div class='row wrapper'>  <?php
                                        for($x=1;$x<=2;$x++){ 
                                           if($x==1){
                                               $position ='L';
                                               $dir = 'left-defaults';
                                           }elseif($x==2){
                                               $position ='R';
                                               $dir = 'right-defaults';
                                           }
                              ?>
                                
                                       <div id='<?php echo $dir;  ?>' class='col-sm-<?php echo $set; ?>'>
                                <?php foreach ($section->elements as $elem => $element): if($element->element_position===$position){
                                          $thecode=$element->element_code;
                                             if($element->element_code === $element->child_element_code){?> 
                                           
                                            <div class='form-group form-group-sm' style='border:1px solid #ccc; margin:4px;' draggable="true">
                                                <label class='control-label col-md-7'><?= $element->element_desc; ?></label>
                                                    <div class='col-md-4'>
                                                      <div class='btn btn-link editElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>'>Edit</div>
                                                      <div class='btn btn-link deleteElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>' data-docid='<?= $document_id; ?>' ><i class='glyphicon glyphicon-remove'></i></div>
                                                    </div>
                                                                                                                    
                                             <?php  foreach ($section->elements as $elem => $element):                                
                                                 if($element->child_element_code === $thecode && $element->element_code != $element->child_element_code){?>
                                                <label class='control-label col-md-7'><?= $element->element_desc; ?></label>
                                                    <div class='col-md-4'>
                                                      <div class='btn btn-link editElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>'>Edit</div>
                                                      <div class='btn btn-link deleteElement' data-elementid='<?= $element->element_code;?>' data-sectioncode='<?php echo $sectionKod; ?>' data-docid='<?= $document_id; ?>' ><i class='glyphicon glyphicon-remove'></i></div>
                                                    </div>
                                                 <?php }
                                             endforeach;
                                             ?></div><?php
                                             }} endforeach;  ?>
                                      </div> <?php                              
                                      } ?> </div></div> <?php
                                       break;
                                       
                                   case '3': $set=4; break;
                               endswitch;
                               ?>
                            </div>
                        
                    <?php endforeach; ?>
                
            </div>
        </form>
    </div>

    <div class='col-sm-3' style="position: fixed; right: 0;">
        <div class='panel panel-default'>
            <div class='panel-heading'>Notes Component</div>
            <div class='panel-body'>
                <ul class='list-unstyled'>
                    <?php foreach ($json_elements as $key => $section): ?>
                        <li><input type='checkbox' class='selectedsection'  name='<?= $key; ?>' value='<?= $key; ?>' checked /> <?= $section->section_desc; ?></li>
                    <?php endforeach; ?>
                </ul>

                <div class='text-right'>
                    <div class='btn-group btn-group-sm'>
                        <a href='<?= SITE_ROOT; ?>/formview/json-format/<?= $document_id; ?>' target="_blank" class='btn btn-default'>View JSON</a>
                        <a href='#' class='btn btn-default changelayout' >Change Layout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <a href="edit-form.php"></a>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal </h4>
            </div>
            <div class="modal-body">
            </div>
        </div>

    </div>
</div>

<div id="layout" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Layout </h4>
            </div>
            <div class="modal-body">
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Delete Element</h3>
            </div>
            <div class="modal-body">               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok" id="btnYes" >Delete</a>
            </div>
        </div>
    </div>
</div>

<script src='<?= SITE_ROOT; ?>/assets/js/dragula.js'></script>
<script src='<?= SITE_ROOT; ?>/assets/js/example.min.js'></script>
<script src='<?= SITE_ROOT; ?>/assets/js/jquery-sortable.js'></script>
<script>
    $(function () {

//        var oldContainer;
//
//        $("ol.nested_with_switch").sortable({
//            group: 'nested',
//            afterMove: function (placeholder, container) {
//                if (oldContainer != container) {
//                    if (oldContainer)
//                        oldContainer.el.removeClass("active");
//                    container.el.addClass("active");
//
//                    oldContainer = container;
//                }
//            },
//            onDrop: function ($item, container, _super) {
//                container.el.removeClass("active");
//                _super($item, container);
//            }
//        });

        $('.expandButton').click(function () {
            var a = $('#notesForm').find(".panel-body[data-section='" + $(this).data('section') + "']").toggleClass('hidden');
            var current = $(this).data('current');
            if(current=='expend'){
                $(this).data('current','hide');
                $(this).html('<i class="glyphicon glyphicon-chevron-up"></i> Hide');
            } else {
                $(this).data('current','expend');
                $(this).html('<i class="glyphicon glyphicon-chevron-down"></i> Expend');
            }
        });
        $('.summernote').summernote({
            height: 100
        });

        $('.selectedsection').change(function () {
            var section = $(this).val();
            $('#notesForm').find("[data-section='" + section + "']").fadeToggle("fast", "linear");
        });
        
        $('.editElement').click(function () {
            var key = $(this).data('elementid');
            var documentId = '<?= $document_id;?>';
            var templateId = '<?= $template_id;?>';
            var sectionId = $(this).data('sectioncode');
            console.log(sectionId);
            $.ajax({
                url: '<?= SITE_ROOT; ?>/formview/load-selected-json/',
                data: {key: key,component:'element', documentId : documentId, templateId: templateId, sectionId :sectionId },
                success: function (data) {
                    var obj = $.parseJSON(data);
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-title').text(obj.component);
                    $('.modal-body').html(obj.html);
                }
            });
            $('#myModal').modal('show');
            return false;
        });
        
        $('.addElement').click(function () {
            var documentId = '<?= $document_id;?>';
            var templateId = '<?= $template_id;?>';
            var sectionId = $(this).data('sectioncode');
            console.log(sectionId);
            $.ajax({
                url: '<?= SITE_ROOT; ?>/formview/add-element/',
                data: {documentId : documentId, templateId: templateId, sectionId :sectionId },
                success: function (data) {
                    var obj = $.parseJSON(data);
                    $('.modal-dialog').addClass('modal-lg');
                    $('.modal-title').text(obj.component);
                    $('.modal-body').html(obj.html);
                }
            });
            $('#myModal').modal('show');
            return false;
        });
        
        $('.editSection').click(function () {
            var key = $(this).data('sectioncode');
            var documentId = '<?= $document_id;?>';
            var templateId = '<?= $template_id;?>';
            console.log(key);
            $.ajax({
                url: '<?= SITE_ROOT; ?>/formview/load-selected-json/',
                data: {key: key,component:'section', documentId : documentId, templateId: templateId },
                success: function (data) {
                    var obj = $.parseJSON(data);
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-title').text(obj.component);
                    $('.modal-body').html(obj.html);
                }
            });
            $('#myModal').modal('show');
            return false;
        });
        
        $('.changelayout').click(function () {
            var documentId = '<?= $document_id;?>';
            $.ajax({
                url: '<?= SITE_ROOT; ?>/formview/change-layout/',
                data: {documentId : documentId},
                success: function (data) {
                    var obj = $.parseJSON(data);
                    $('.modal-dialog').removeClass('modal-lg');
                    $('.modal-title').text(obj.component);
                    $('.modal-body').html(obj.html);
                }
            });
            $('#layout').modal('show');
            return false;
        });

    });
    
    $('#deleteModal').on('show', function() {
    var id = $(this).data('elementid'),
        removeBtn = $(this).find('.danger');
    });

    $('.deleteElement').on('click', function(e) {
       e.preventDefault();

    var id = $(this).data('elementid');
    var docID = $(this).data('docid');
    var sectionCode = $(this).data('sectioncode');
    
    $('#deleteModal').data('elementid', id).modal('show');
    $('#deleteModal').data('docId', docID);
    $('#deleteModal').data('sectionCode', sectionCode);
    $('.modal-body').html('Are you sure ?');
    });

    $('#btnYes').click(function() {
  	var id = $('#deleteModal').data('elementid');
        var docId = $('#deleteModal').data('docId');
        var sectionCode = $('#deleteModal').data('sectionCode');
//        alert('element='+id+'....doc='+docId+'...section='+sectionCode);
            $.ajax({
                url: '<?= SITE_ROOT; ?>/formview/delete-element/',
                data: {elementId : id, documentId : docId, sectionCode :sectionCode},
                success: function (data) {
                   location.reload();
                }
            });        
    });
</script>

<?= $footer; ?>