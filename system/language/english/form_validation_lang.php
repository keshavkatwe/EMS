<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

$lang['form_validation_required']		= '<i class="text-danger">{field} field is required.</i>';
$lang['form_validation_isset']			= '<i class="text-danger"> {field} field must have a value.</i>';
$lang['form_validation_valid_email']		= '<i class="text-danger"> {field} field must contain a valid email address.</i>';
$lang['form_validation_valid_emails']		= '<i class="text-danger"> {field} field must contain all valid email addresses.</i>';
$lang['form_validation_valid_url']		= '<i class="text-danger"> {field} field must contain a valid URL.</i>';
$lang['form_validation_valid_ip']		= '<i class="text-danger"> {field} field must contain a valid IP.</i>';
$lang['form_validation_min_length']		= '<i class="text-danger"> {field} field must be at least {param} characters in length.</i>';
$lang['form_validation_max_length']		= '<i class="text-danger"> {field} field cannot exceed {param} characters in length.</i>';
$lang['form_validation_exact_length']		= '<i class="text-danger"> {field} field must be exactly {param} characters in length.</i>';
$lang['form_validation_alpha']			= '<i class="text-danger"> {field} field may only contain alphabetical characters.</i>';
$lang['form_validation_alpha_numeric']		= '<i class="text-danger"> {field} field may only contain alpha-numeric characters.</i>';
$lang['form_validation_alpha_numeric_spaces']	= '<i class="text-danger"> {field} field may only contain alpha-numeric characters and spaces.</i>';
$lang['form_validation_alpha_dash']		= '<i class="text-danger"> {field} field may only contain alpha-numeric characters, underscores, and dashes.</i>';
$lang['form_validation_numeric']		= '<i class="text-danger"> {field} field must contain only numbers.</i>';
$lang['form_validation_is_numeric']		= '<i class="text-danger"> {field} field must contain only numeric characters.</i>';
$lang['form_validation_integer']		= '<i class="text-danger"> {field} field must contain an integer.</i>';
$lang['form_validation_regex_match']		= '<i class="text-danger"> {field} field is not in the correct format.</i>';
$lang['form_validation_matches']		= '<i class="text-danger"> {field} field does not match the {param} field.</i>';
$lang['form_validation_differs']		= '<i class="text-danger"> {field} field must differ from the {param} field.</i>';
$lang['form_validation_is_unique'] 		= '<i class="text-danger"> {field} field must contain a unique value.</i>';
$lang['form_validation_is_natural']		= '<i class="text-danger"> {field} field must only contain digits.</i>';
$lang['form_validation_is_natural_no_zero']	= '<i class="text-danger"> {field} field must only contain digits and must be greater than zero.</i>';
$lang['form_validation_decimal']		= '<i class="text-danger"> {field} field must contain a decimal number.</i>';
$lang['form_validation_less_than']		= '<i class="text-danger"> {field} field must contain a number less than {param}.</i>';
$lang['form_validation_less_than_equal_to']	= '<i class="text-danger"> {field} field must contain a number less than or equal to {param}.</i>';
$lang['form_validation_greater_than']		= '<i class="text-danger"> {field} field must contain a number greater than {param}.</i>';
$lang['form_validation_greater_than_equal_to']	= '<i class="text-danger"> {field} field must contain a number greater than or equal to {param}.</i>';
$lang['form_validation_error_message_not_set']	= '<i class="text-danger">Unable to access an error message corresponding to your field name {field}.</i>';
$lang['form_validation_in_list']		= '<i class="text-danger"> {field} field must be one of: {param}.</i>';
