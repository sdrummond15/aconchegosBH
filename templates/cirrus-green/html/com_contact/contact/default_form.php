<?php

/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.tooltip');
if (isset($this->error)) : ?>
	<div class="contact-error">
		<?php echo $this->error; ?>
	</div>
<?php endif; ?>

<script src="../templates/cirrus-green/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	/* Máscaras TELEFONE */
	function mascara(o, f) {
		v_obj = o
		v_fun = f
		setTimeout("execmascara()", 1)
	}

	function execmascara() {
		v_obj.value = v_fun(v_obj.value)
	}

	function mtel(v) {
		v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
		v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
		v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
		return v;
	}

	function id(el) {
		return document.getElementById(el);
	}
	/*TELEFONE 1*/
	window.onload = function() {
		id('jform_phone').onkeyup = function() {
			mascara(this, mtel);
		}
	}
</script>

<div class="contact-form">
	<form id="contact-form" action="<?php echo JRoute::_('index.php'); ?>" method="post" class="form-validate form-horizontal">
		<fieldset id="contact-form-informations-fieldset">
			<div class="control-group">
				<div class="controls"><?php echo $this->form->getInput('contact_name'); ?></div>
			</div>
			<div class="control-group">
				<div class="controls"><?php echo $this->form->getInput('contact_email'); ?></div>
			</div>
			<div class="control-group">
				<div class="controls"><?php echo $this->form->getInput('phone'); ?></div>
			</div>
			<div class="control-group">
				<div class="controls"><?php echo $this->form->getInput('contact_subject'); ?></div>
			</div>
		</fieldset>
		<fieldset id="contact-form-message-fieldset">
			<div class="control-group">
				<div class="controls"><?php echo $this->form->getInput('contact_message'); ?></div>
			</div>
			<?php if ($this->params->get('show_email_copy')) { ?>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('contact_email_copy'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('contact_email_copy'); ?></div>
				</div>
			<?php 	} ?>
			<?php //Dynamically load any additional fields from plugins. 
			?>
			<?php foreach ($this->form->getFieldsets() as $fieldset) : ?>
				<?php if ($fieldset->name != 'contact') : ?>
					<?php $fields = $this->form->getFieldset($fieldset->name); ?>
					<?php foreach ($fields as $field) : ?>
						<div class="control-group">
							<?php if ($field->hidden) : ?>
								<div class="controls">
									<?php echo $field->input; ?>
								</div>
							<?php else : ?>
								<div class="control-label">
									<?php echo $field->label; ?>
									<?php if (!$field->required && $field->type != "Spacer") : ?>
										<span class="optional"><?php echo JText::_('COM_CONTACT_OPTIONAL'); ?></span>
									<?php endif; ?>
								</div>
								<div class="controls"><?php echo $field->input; ?></div>
							<?php endif; ?>
						</div>
					<?php endforeach; ?>
				<?php endif ?>
			<?php endforeach; ?>
			<div class="form-actions"><button class="btn btn-primary validate" id="contact-form-confirm-button" type="submit"><?php echo JText::_('COM_CONTACT_CONTACT_SEND'); ?></button>
				<input type="hidden" name="option" value="com_contact" />
				<input type="hidden" name="task" value="contact.submit" />
				<input type="hidden" name="return" value="<?php echo $this->return_page; ?>" />
				<input type="hidden" name="id" value="<?php echo $this->contact->slug; ?>" />
				<?php echo JHtml::_('form.token'); ?>
			</div>
		</fieldset>
	</form>
</div>