<?php
/* @var $this AdminController */
/* @var $demosize string */
/* @var $total_admins integer */
/* @var $total_archived_appeals integer */
/* @var $total_archived_reports integer */
/* @var $total_bans integer */
/* @var $total_blocks integer */
/* @var $total_appeals integer */
/* @var $total_servers integer */
/* @var $total_reports integer */
?>
    <div class="row">
      <div class="span8" style="float: none; margin: 0 auto;">
<?php $this->widget('zii.widgets.CMenu', array(
	'id' => 'admin',
	'items' => $this->menu,
	'encodeLabel' => false,
	'htmlOptions' => array(
		'class' => 'nav',
		'style' => 'overflow: auto',
	),
)) ?>
      </div>
      <div class="span8" style="float: none; margin: 0 auto;">
        <table class="table table-stat">
          <tbody>
            <tr>
              <td class="value" width="20%"><?php echo $total_appeals ?></td>
              <td width="30%"><?php echo Yii::t('sourcebans', 'controllers.admin.bans.menu.appeals') ?></td>
              <td class="value" width="20%"><?php echo $total_archived_appeals ?></td>
              <td width="30%"><?php echo Yii::t('sourcebans', 'Archived appeals') ?></td>
            </tr>
            <tr>
              <td class="value"><?php echo $total_reports ?></td>
              <td><?php echo Yii::t('sourcebans', 'controllers.admin.bans.menu.reports') ?></td>
              <td class="value"><?php echo $total_archived_reports ?></td>
              <td><?php echo Yii::t('sourcebans', 'Archived reports') ?></td>
            </tr>
            <tr>
              <td class="value"><?php echo $demosize ?></td>
              <td><?php echo Yii::t('sourcebans', 'Demos') ?></td>
              <td class="value"><?php echo $total_blocks ?></td>
              <td><?php echo Yii::t('sourcebans', 'Players blocked') ?></td>
            </tr>
            <tr>
              <td class="value"><span id="relver">...</span></td>
              <td><?php echo Yii::t('sourcebans', 'Latest release') ?></td>
              <td class="text-center" colspan="2"><span id="versionmsg"><?php echo Yii::t('sourcebans', 'Please wait') ?>...</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
<?php Yii::app()->clientScript->registerScript('admin_index', '
  $.getJSON("' . $this->createUrl('admin/version') . '", function(data) {
    if(data.error) {
      $("#relver").text("' . Yii::t('sourcebans', 'Error') . '").addClass("text-error");
      $("#versionmsg").text(data.error).addClass("text-error");
      return;
    }
    if(data.update) {
      $("#versionmsg").text("' . Yii::t('sourcebans', 'A new release is available.') . '").addClass("text-error");
    }
    else {
      $("#versionmsg").text("' . Yii::t('sourcebans', 'You have the latest release.') . '").addClass("text-success");
    }
    
    $("#relver").text(data.version);
    $("#versionmsg").css("font-weight", "bold");
  });
') ?>