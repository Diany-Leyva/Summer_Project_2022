<?php

include_once('include/initialize.php');
echoHeader('Comments');
// echoBackgroundImageHeader('pagesHeader');

$errors = [];







// echo"<div class='wpd-form wpd-form-wrapper wpd-main-form-wrapper' id='wpd-main-form-wrapper-0_0'>
//                                         <form class='wpd_comm_form wpd_main_comm_form' method='post' enctype='multipart/form-data' data-uploading='false'>
//                     <div class='wpd-field-comment'>
//                         <div class='wpdiscuz-item wc-field-textarea'>
//                             <div class='wpdiscuz-textarea-wrap '>
//                                                                                                         <div class='wpd-avatar'>
//                                         <img alt='guest' src='https://secure.gravatar.com/avatar/?s=56&amp;d=mm&amp;r=g' srcset='https://secure.gravatar.com/avatar/?s=112&amp;d=mm&amp;r=g 2x' class='avatar avatar-56 photo avatar-default' height='56' width='56' loading='lazy'>                                    </div>
//                                                 <div id='wpd-editor-wraper-0_0' style=''>
                
//                 <label style='display: none;' for='wc-textarea-0_0'>Label</label>
                
//                 <div id='wpd-editor-0_0' class='ql-container ql-snow'><div class='ql-editor ql-blank' data-gramm='false' contenteditable='true' data-placeholder='Join the discussion'><p><br></p></div><div class='ql-clipboard' contenteditable='true' tabindex='-1'></div><div class='ql-tooltip ql-hidden'><a class='ql-preview' target='_blank' href='about:blank'></a><input type='text' data-formula='e=mc^2' data-link='https://example.com' data-video='Embed URL'><a class='ql-action'></a><a class='ql-remove'></a></div><div class='ql-texteditor'><textarea id='wc-textarea-0_0' required='' name='wc_comment' class='wc_comment wpd-field' style='display: none;'></textarea></div></div>
//                         <div id='wpd-editor-toolbar-0_0' class='ql-toolbar ql-snow'>
//                             <button title='Bold' class='ql-bold' type='button'><svg viewBox='0 0 18 18'> <path class='ql-stroke' d='M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z'></path> <path class='ql-stroke' d='M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z'></path> </svg></button>
//                                 <button title='Italic' class='ql-italic' type='button'><svg viewBox='0 0 18 18'> <line class='ql-stroke' x1='7' x2='13' y1='4' y2='4'></line> <line class='ql-stroke' x1='5' x2='11' y1='14' y2='14'></line> <line class='ql-stroke' x1='8' x2='10' y1='14' y2='4'></line> </svg></button>
//                                 <button title='Underline' class='ql-underline' type='button'><svg viewBox='0 0 18 18'> <path class='ql-stroke' d='M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3'></path> <rect class='ql-fill' height='1' rx='0.5' ry='0.5' width='12' x='3' y='15'></rect> </svg></button>
//                                 <button title='Strike' class='ql-strike' type='button'><svg viewBox='0 0 18 18'> <line class='ql-stroke ql-thin' x1='15.5' x2='2.5' y1='8.5' y2='9.5'></line> <path class='ql-fill' d='M9.007,8C6.542,7.791,6,7.519,6,6.5,6,5.792,7.283,5,9,5c1.571,0,2.765.679,2.969,1.309a1,1,0,0,0,1.9-.617C13.356,4.106,11.354,3,9,3,6.2,3,4,4.538,4,6.5a3.2,3.2,0,0,0,.5,1.843Z'></path> <path class='ql-fill' d='M8.984,10C11.457,10.208,12,10.479,12,11.5c0,0.708-1.283,1.5-3,1.5-1.571,0-2.765-.679-2.969-1.309a1,1,0,1,0-1.9.617C4.644,13.894,6.646,15,9,15c2.8,0,5-1.538,5-3.5a3.2,3.2,0,0,0-.5-1.843Z'></path> </svg></button>
//                                 <button title='Ordered List' class=ql-list' value='ordered' type='button'><svg viewBox='0 0 18 18'> <line class='ql-stroke' x1='7' x2='15' y1='4' y2='4'></line> <line class='ql-stroke' x1='7' x2='15' y1='9' y2='9'></line> <line class='ql-stroke' x1='7' x2='15' y1='14' y2='14'></line> <line class='ql-stroke ql-thin' x1='2.5' x2='4.5' y1='5.5' y2='5.5'></line> <path class='ql-fill' d='M3.5,6A0.5,0.5,0,0,1,3,5.5V3.085l-0.276.138A0.5,0.5,0,0,1,2.053,3c-0.124-.247-0.023-0.324.224-0.447l1-.5A0.5,0.5,0,0,1,4,2.5v3A0.5,0.5,0,0,1,3.5,6Z'></path> <path class='ql-stroke ql-thin' d='M4.5,10.5h-2c0-.234,1.85-1.076,1.85-2.234A0.959,0.959,0,0,0,2.5,8.156'></path> <path class='ql-stroke ql-thin' d='M2.5,14.846a0.959,0.959,0,0,0,1.85-.109A0.7,0.7,0,0,0,3.75,14a0.688,0.688,0,0,0,.6-0.736,0.959,0.959,0,0,0-1.85-.109'></path> </svg></button>
//                                 <button title='Unordered List' class='ql-list' value='bullet' type='button'><svg viewBox='0 0 18 18'> <line class='ql-stroke' x1='6' x2='15' y1='4' y2='4'></line> <line class='ql-stroke' x1='6' x2='15' y1='9' y2='9'></line> <line class='ql-stroke' x1='6' x2='15' y1='14' y2='14'></line> <line class='ql-stroke' x1='3' x2='3' y1='4' y2='4'></line> <line class='ql-stroke' x1='3' x2='3' y1='9' y2='9'></line> <line class='ql-stroke' x1='3' x2='3' y1='14' y2='14'></line> </svg></button>
//                                 <button title='Blockquote' class='ql-blockquote' type='button'><svg viewBox='0 0 18 18'> <rect class='ql-fill ql-stroke' height='3' width='3' x='4' y='5'></rect> <rect class='ql-fill ql-stroke' height='3' width='3' x='11' y='5'></rect> <path class='ql-even ql-fill ql-stroke' d='M7,8c0,4.031-3,5-3,5'></path> <path class='ql-even ql-fill ql-stroke' d='M14,8c0,4.031-3,5-3,5'></path> </svg></button>
//                                 <button title='Code Block' class='ql-code-block' type='button'><svg viewBox='0 0 18 18'> <polyline class='ql-even ql-stroke' points='5 7 3 9 5 11'></polyline> <polyline class='ql-even ql-stroke' points='13 7 15 9 13 11'></polyline> <line class='ql-stroke' x1='10' x2='8' y1='5' y2='13'></line> </svg></button>
//                                 <button title='Link' class='ql-link' type='button'><svg viewBox='0 0 18 18'> <line class='ql-stroke' x1='7' x2='11' y1='7' y2='11'></line> <path class='ql-even ql-stroke' d='M8.9,4.577a3.476,3.476,0,0,1,.36,4.679A3.476,3.476,0,0,1,4.577,8.9C3.185,7.5,2.035,6.4,4.217,4.217S7.5,3.185,8.9,4.577Z'></path> <path class='ql-even ql-stroke' d='M13.423,9.1a3.476,3.476,0,0,0-4.679-.36,3.476,3.476,0,0,0,.36,4.679c1.392,1.392,2.5,2.542,4.679.36S14.815,10.5,13.423,9.1Z'></path> </svg></button>
//                                 <button title='Source Code' class='ql-sourcecode' data-wpde_button_name='sourcecode' type='button'>{}</button>
//                                 <button title='Spoiler' class='ql-spoiler' data-wpde_button_name='spoiler' type='button'>[+]</button>
//                             <div class='wpd-editor-buttons-right'>
//                 <span class='wmu-upload-wrap' wpd-tooltip='Attach an image to this comment' wpd-tooltip-position='left'><label class='wmu-add'><i class='far fa-image'></i><input style='display:none;' class='wmu-add-files' type='file' name='wmu_files[]' accept='image/*'></label></span>            </div>
//         </div>
//                     </div>
//                                         </div>
//                         </div>
//                     </div>
//                     <div class='wpd-form-foot' style=''>
//                         <div class='wpdiscuz-textarea-foot'>
//                                                         <div class='wpdiscuz-button-actions'><div class='wmu-action-wrap'><div class='wmu-tabs wmu-images-tab wmu-hide'></div></div></div>
//                         </div>
//                                 <div class='wpd-form-row'>
//                     <div class='wpd-form-col-left'>
//                         <div class='wpdiscuz-item wc_name-wrapper wpd-has-icon'>
//                                     <div class='wpd-field-icon'><i class='fas fa-user'></i></div>
//                                     <input id='wc_name-0_0' value='' required='required' aria-required='true' class='wc_name wpd-field' type='text' name='wc_name' placeholder='Name*' maxlength='50' pattern='.{3,50}' title=''>
//                 <label for='wc_name-0_0' class='wpdlb'>Name*</label>
//                             </div>
//                         <div class='wpdiscuz-item wc_email-wrapper wpd-has-icon'>
//                                     <div class='wpd-field-icon'><i class='fas fa-at'></i></div>
//                                     <input id='wc_email-0_0' value='' required='required' aria-required='true' class='wc_email wpd-field' type='email' name='wc_email' placeholder='Email*'>
//                 <label for='wc_email-0_0' class='wpdlb'>Email*</label>
//                             </div>
//                             <div class='wpdiscuz-item wc_website-wrapper wpd-has-icon'>
//                                             <div class='wpd-field-icon'><i class='fas fa-link'></i></div>
//                                         <input id='wc_website-0_0' value='' class='wc_website wpd-field' type='text' name='wc_website' placeholder='Website'>
//                     <label for='wc_website-0_0' class='wpdlb'>Website</label>
//                                     </div>
//                         </div>
//                 <div class='wpd-form-col-right'>
//                     <div class='wc-field-submit'>
                                            
//                                             <label class='wpd_label' wpd-tooltip='Notify of new replies to this comment'>
//                             <input id='wc_notification_new_comment-0_0' class='wc_notification_new_comment-0_0 wpd_label__checkbox' value='comment' type='checkbox' name='wpdiscuz_notification_type'>
//                             <span class='wpd_label__text'>
//                                 <span class='wpd_label__check'>
//                                     <i class='fas fa-bell wpdicon wpdicon-on'></i>
//                                     <i class='fas fa-bell-slash wpdicon wpdicon-off'></i>
//                                 </span>
//                             </span>
//                         </label>
//                                                                 <input id='wpd-field-submit-0_0' class='wc_comm_submit wpd_not_clicked wpd-prim-button' type='submit' name='submit' value='Post Comment'>
//         </div>
//                 </div>
//                     <div class='clearfix'></div>
//         </div>
//                             </div>
//                                         <input type='hidden' class='wpdiscuz_unique_id' value='0_0' name='wpdiscuz_unique_id'>
//                 </form>
//                         </div>";