<?php
/**
 * Podcast Manager for Joomla!
 *
 * @package     PodcastManager
 * @subpackage  files_podcastmanager_strapped
 *
 * @copyright   Copyright (C) 2011-2012 Michael Babker. All rights reserved.
 * @license     GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 *
 * Podcast Manager is based upon the ideas found in Podcast Suite created by Joe LeBlanc
 * Original copyright (c) 2005 - 2008 Joseph L. LeBlanc and released under the GPLv2 license
 */

defined('_JEXEC') or die;

$user = JFactory::getUser();
?>
<div class="row-fluid">
	<!-- Begin Sidebar -->
	<div class="span2">
		<div id="treeview">
			<div id="media-tree_tree" class="sidebar-nav">
				<?php echo $this->loadTemplate('folders'); ?>
			</div>
		</div>
	</div>
	<!-- End Sidebar -->
	<!-- Begin Content -->
	<div class="span10">
		<?php if (($user->authorise('core.create', 'com_podcastmanager')) and $this->require_ftp): ?>
		<form action="index.php?option=com_podcastmedia&amp;task=ftpValidate" name="ftpForm" id="ftpForm" method="post">
			<fieldset title="<?php echo JText::_('COM_PODCASTMEDIA_DESCFTPTITLE'); ?>">
				<legend><?php echo JText::_('COM_PODCASTMEDIA_DESCFTPTITLE'); ?></legend>
				<?php echo JText::_('COM_PODCASTMEDIA_DESCFTP'); ?>
				<label for="username"><?php echo JText::_('JGLOBAL_USERNAME'); ?></label>
				<input type="text" id="username" name="username" class="inputbox" size="70" value="" />

				<label for="password"><?php echo JText::_('JGLOBAL_PASSWORD'); ?></label>
				<input type="password" id="password" name="password" class="inputbox" size="70" value="" />
			</fieldset>
		</form>
		<?php endif; ?>

		<form action="index.php?option=com_podcastmedia" name="adminForm" id="mediamanager-form" method="post" enctype="multipart/form-data" >
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="cb1" id="cb1" value="0" />
			<input class="update-folder" type="hidden" name="folder" id="folder" value="<?php echo $this->state->folder; ?>" />
		</form>

		<?php if ($user->authorise('core.create', 'com_podcastmanager'))
		{ ?>
		<!-- File Upload Form -->
		<div id="collapseUpload" class="collapse">
			<form action="<?php echo JURI::base(); ?>index.php?option=com_podcastmedia&amp;task=file.upload&amp;tmpl=component&amp;<?php echo $this->session->getName() . '=' . $this->session->getId(); ?>&amp;<?php echo $this->session->getFormToken(); ?>=1&amp;format=<?php echo $this->medmanparams->get('enable_flash')=='1' ? 'json' : 'html' ?>" id="uploadForm" class="form-inline" name="uploadForm" method="post" enctype="multipart/form-data">
				<div id="uploadform">
					<fieldset id="upload-noflash" class="actions">
						<label for="upload-file" class="control-label"><?php echo JText::_('COM_PODCASTMEDIA_UPLOAD_FILE'); ?></label>
						<input type="file" id="upload-file" name="Filedata[]" multiple /> <button class="btn btn-primary" id="upload-submit"><i class="icon-upload icon-white"></i> <?php echo JText::_('COM_PODCASTMEDIA_START_UPLOAD'); ?></button>
						<p class="help-block"><?php echo $this->medmanparams->get('upload_maxsize')=='0' ? JText::_('COM_PODCASTMEDIA_UPLOAD_FILES_NOLIMIT') : JText::sprintf('COM_PODCASTMEDIA_UPLOAD_FILES', $this->medmanparams->get('upload_maxsize')); ?></p>
					</fieldset>
					<div id="upload-flash" class="hide">
						<ul>
							<li><a href="#" id="upload-browse"><?php echo JText::_('COM_PODCASTMEDIA_BROWSE_FILES'); ?></a></li>
							<li><a href="#" id="upload-clear"><?php echo JText::_('COM_PODCASTMEDIA_CLEAR_LIST'); ?></a></li>
							<li><a href="#" id="upload-start"><?php echo JText::_('COM_PODCASTMEDIA_START_UPLOAD'); ?></a></li>
						</ul>
						<div class="clr"></div>
						<p class="overall-title"></p>
						<?php echo JHtml::_('image', 'media/bar.gif', JText::_('COM_PODCASTMEDIA_OVERALL_PROGRESS'), array('class' => 'progress overall-progress'), true); ?>
						<div class="clr"></div>
						<p class="current-title"></p>
						<?php echo JHtml::_('image', 'media/bar.gif', JText::_('COM_PODCASTMEDIA_CURRENT_PROGRESS'), array('class' => 'progress current-progress'), true); ?>
						<p class="current-text"></p>
					</div>
					<ul class="upload-queue" id="upload-queue">
						<li style="display: none;"></li>
					</ul>
				</div>
			</form>
		</div>
		<div id="collapseFolder" class="collapse">
			<form action="index.php?option=com_podcastmedia&amp;task=folder.create&amp;tmpl=<?php echo JFactory::getApplication()->input->get('tmpl', 'index', 'cmd'); ?>" name="folderForm" id="folderForm" class="form-inline" method="post">
				<div class="path">
					<input class="inputbox" type="text" id="folderpath" readonly="readonly" />
					<input class="inputbox" type="text" id="foldername" name="foldername"  />
					<input class="update-folder" type="hidden" name="folderbase" id="folderbase" value="<?php echo $this->state->folder; ?>" />
					<button type="submit" class="btn"><i class="icon-folder"></i> <?php echo JText::_('COM_PODCASTMEDIA_CREATE_FOLDER'); ?></button>
				</div>
				<?php echo JHtml::_('form.token'); ?>
			</form>
		</div>
		<?php } ?>

		<form action="index.php?option=com_podcastmedia&amp;task=folder.create&amp;tmpl=<?php echo JFactory::getApplication()->input->get('tmpl', 'index', 'cmd'); ?>" name="folderForm" id="folderForm" method="post">
			<div id="folderview">
				<div class="view">
					<iframe class="thumbnail" src="index.php?option=com_podcastmedia&amp;view=mediaList&amp;tmpl=component&amp;folder=<?php echo $this->state->folder;?>" id="folderframe" name="folderframe" width="100%" height="500px" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
				</div>
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</form>