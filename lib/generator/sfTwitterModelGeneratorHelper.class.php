<?php

/**
 * Model generator helper.
 *
 * @package    symfony
 * @subpackage generator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfModelGeneratorHelper.class.php 22914 2009-10-10 12:24:29Z Kris.Wallsmith $
 */
abstract class sfTwitterModelGeneratorHelper extends sfModelGeneratorHelper
{
  public function linkToNew($params)
  {
    return '<a class="btn success" href="'.url_for('@'.$this->getUrlForAction('new')).'">'.__($params['label'], array(), 'sf_admin').'</a>';
  }

  public function linkToEdit($object, $params)
  {
    return '<li class="edit">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('edit'), $object).'</li>';
  }

  public function linkToDelete($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    return '<li class="delete">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('method' => 'delete', 'confirm' => !empty($params['confirm']) ? __($params['confirm'], array(), 'sf_admin') : $params['confirm'])).'</li>';
  }

  public function linkToDeleteBtn($object, $params)
  {
    if ($object->isNew())
    {
      return '';
    }

    $confirm = '';
    if (isset($params['confirm'])) {
      $confirm = $this->generateDeleteConfirm($params['confirm']);
    }

    return '<li class="delete">'.link_to(__($params['label'], array(), 'sf_admin'), $this->getUrlForAction('delete'), $object, array('class' => 'btn danger delete', 'onclick' => $confirm)).'</li>';
  }

  public function linkToList($params)
  {
    return '<li>'.link_to(__($params['label'], array(), 'sf_admin'), '@'.$this->getUrlForAction('list'), array('class' => 'btn mlm')).'</li>';
  }

  public function linkToSave($object, $params)
  {
    return '<li><input class="btn primary mlm" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" /></li>';
  }

  public function linkToSaveAndAdd($object, $params)
  {
    if (!$object->isNew())
    {
      return '';
    }

    return '<li><input class="btn success mlm" type="submit" value="'.__($params['label'], array(), 'sf_admin').'" name="_save_and_add" /></li>';
  }

  protected function generateDeleteConfirm($confirm)
  {
    $confirmMsg = __($confirm, array(), 'sf_admin');
    $confirm = "var self = this; bootbox.confirm('$confirmMsg', function(result) {if (result) {".$this->generateMethodFunction('delete')."}}); return false;";
    return $confirm;
  }

  protected function generateMethodFunction($method)
  {
    $function = "var f = document.createElement('form'); f.style.display = 'none'; self.parentNode.appendChild(f); f.method = 'post'; f.action = self.href;";

    if ('post' != strtolower($method)) {
      $function .= "var m = document.createElement('input'); m.setAttribute('type', 'hidden'); ";
      $function .= sprintf("m.setAttribute('name', 'sf_method'); m.setAttribute('value', '%s'); f.appendChild(m);", strtolower($method));
    }

    // CSRF protection
    $form = new BaseForm();
    if ($form->isCSRFProtected()) {
      $function .= "var m = document.createElement('input'); m.setAttribute('type', 'hidden'); ";
      $function .= sprintf("m.setAttribute('name', '%s'); m.setAttribute('value', '%s'); f.appendChild(m);", $form->getCSRFFieldName(), $form->getCSRFToken());
    }

    $function .= "f.submit();";

    return $function;
  }
}
