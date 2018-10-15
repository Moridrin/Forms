<?php
/**
 * Plugin Name: SSV Forms
 * Plugin URI: http://moridrin.com/ssv-forms
 * Description: This is a plugin to create forms with ease.
 * Version: 0.1.9
 * Author: Jeroen Berkvens
 * Author URI: http://nl.linkedin.com/in/jberkvens/
 * License: WTFPL
 * License URI: http://www.wtfpl.net/txt/copying/
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once 'general/general.php';
require_once 'general/forms/forms.php';

function mp_ssv_members_meta_boxes()
{
    add_meta_box('role_form', 'Registration Form', 'mp_ssv_role_form', 'users_page_roles', 'side', 'default');
    add_meta_box('role_form', 'Registration Form', 'mp_ssv_role_form', 'users_page_role-new', 'side', 'default');
}

function mp_ssv_role_form(WP_Role $role)
{
    $forms = \mp_general\forms\models\Form::getAll();
    $registrationForms = get_option('registrationForms', []);
    $selected = $registrationForms[$role->name] ?? null;
    ?>
    <p>Select here The registration form for this user type</p>
    <select name="registrationForm">
        <option value="-1" <?= $selected === null ? 'selected' : '' ?>>[no registration form]</option>
        <?php
        foreach ($forms as $form) {
            ?><option value="<?=\mp_general\base\BaseFunctions::escape($form->getId(), 'attr')?>" <?= $selected === $form->getId() ? 'selected' : '' ?>><?=\mp_general\base\BaseFunctions::escape($form->getTitle(), 'html')?></option><?php
        }
        ?>
    </select>
    <?php
}

function mp_ssv_members_role_updated(string $roleName)
{
    $registrationForms = get_option('registrationForms', []);
    $registrationForms[$roleName] = \mp_general\base\BaseFunctions::getParameter('registrationForm', 'int');
    update_option('registrationForms', $registrationForms);
}

add_action('add_meta_boxes', 'mp_ssv_members_meta_boxes');

add_action('members_role_updated', 'mp_ssv_members_role_updated');
