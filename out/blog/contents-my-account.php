<?php include_once (dirname(dirname(dirname(__FILE__))).'/initialize.php'); ?>
<?php include_once (eblogin.'/session.inc.php'); ?>
<aside class='col-right sidebar wow bounceInUp animated'>
<div class='block block-account'>
<div class='block-title'>Blog Settings</div>
<div class='block-content'>
<ul>
<?php if ($_SESSION['memberlevel'] >= 1) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents/' title='Blog'><i class='fa fa-pencil-square-o fa-lg' aria-hidden='true'></i> Blog</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-referral.php' title='Refer friends'><i class='fa fa-user-plus fa-lg' aria-hidden='true'></i> Refer friends</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 9) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents-approve-query.php' title='Comments'><i class='fa fa-comment fa-lg' aria-hidden='true'></i> Comments</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-admin-view-items.php' title='Approval'><i class='fa fa-refresh fa-lg' aria-hidden='true'></i> Approval</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 1) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents-items-status.php' title='Post Status'><i class='fa fa-tasks fa-lg' aria-hidden='true'></i> Post Status</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-add-items.php' title='Free Guest Post'><i class='fa fa-plus fa-lg' aria-hidden='true'></i> Free Guest Post</a></li>
<?php } ?>
<?php if ($_SESSION['memberlevel'] >= 9) { ?>
<li><a href='<?php echo outContentsLink; ?>/contents-add-sub-category.php' title='Add Sub Category'><i class='fa fa-sort-amount-asc fa-lg' aria-hidden='true'></i> Add Sub Category</a></li>
<li><a href='<?php echo outContentsLink; ?>/contents-add-category.php' title='Add Category'><i class='fa fa-database fa-lg' aria-hidden='true'></i> Add Category</a></li>
<?php } ?>
</ul>
</div>
</div>
</aside>