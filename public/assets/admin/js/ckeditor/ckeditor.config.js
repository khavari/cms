/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.basePath = '/assets/admin/js/ckeditor/';

CKEDITOR.editorConfig = function (config) {
  // Define changes to default configuration here.
  // For complete reference see:
  // http://docs.ckeditor.com/#!/api/CKEDITOR.config
  // The toolbar groups arrangement, optimized for two toolbar rows.
  // config.justifyClasses = ['text-left', 'text-center', 'text-right', 'text-justify'];

  config.filebrowserBrowseUrl = '/dashboard/filemanager/ckeditor';

  // Remove some buttons provided by the standard plugins, which are
  // not needed in the Standard(s) toolbar.
  // config.removeButtons = '';

  // Set the most common block elements.
  config.formatTags = 'p;h1;h2;h3;h4;h5;h6;header;aside;pre';

  var language = document.getElementsByTagName('html')[0].getAttribute('lang');
  if (language.length > 0) {
    config.language = language;
  } else {
    config.language = 'fa';
  }
  config.extraPlugins = 'colorbutton,bootstrapTabs,btbutton,autogrow,showblocks,pastefromword,lineutils,bidi,justify,btgrid,dialogadvtab,tabletools,colordialog,tableresize,bt_table,accordionList,glyphicons,bootstrapVisibility,video,fakeobjects,cssanim';

};
