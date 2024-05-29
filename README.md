# MDEditor

![MDEditor-Logo](./docs/images/MDEditor_logo.png)

A free and opensource MarkDown editor, with the support of exporting HTML and PDF.

## Installation

**Automatic installation and running in GNU/Linux:**

Installation:
```
git clone https://github.com/TadavomnisT/MDEditor.git
chmod +x start_gui.sh
```
Running GUI:
```
./start_gui.sh
```

----------------------------

**Installing and running manually:**

* Download the source-code:
```
git clone https://github.com/TadavomnisT/MDEditor.git
```
* Using GUI:
```
cd MDEditor
php -S 127.0.0.1:8989
```
Then open the url `http://127.0.0.1:8989/` with a browser.
* Using as library:

Just include `MDEditor.php` and use it:
```php
require_once "MDEditor.php";
$mde = new MDEditor;
```

## Todo-List
+ Add support of Mediawiki
+ Add Sizes for html in GUI
+ Add support of Hebrew
+ Make Headings HyperLink-able by HTML#
+ Fix HTML code and table color problems
+ Add font Embedding feature


## Available document styles

|Available document styles:|
|--------|
|light|
|light_960px|
|dark_black|
|dark_black_960px|
|dark_gray|
|dark_gray_960px|
|toggle_darkmodeblack_white|
|toggle_darkmodeblack_white_960px|
|toggle_darkmodegray_white|
|toggle_darkmodegray_white_960px|
|toggle_darkmodeblack_dark|
|toggle_darkmodeblack_dark_960px|
|toggle_darkmodegray_dark|
|toggle_darkmodegray_dark_960px|


## Acknowledgements

**This project is powered by:**
* Parsdown : https://github.com/erusev/parsedown
* Mpdf : https://github.com/mpdf/mpdf
* Html2Text : https://github.com/mtibben/html2text
* Text_LanguageDetect : https://github.com/pear/Text_LanguageDetect
* CodeHive's simple markdown WYSIWYG toolbar : https://codepen.io/michaellee/pen/JdbqGW

**Inspiration:**
* Remarkable : https://github.com/jamiemcg/Remarkable
  
**Contributors:**
* [@Tadavomnist](https://github.com/TadavomnisT) (behrad.b)
* [@hctilg](https://github.com/hctilg) (Mahi)
* [@amiria703](https://github.com/amiria703) (Amir Hossein "Amiria" Maher)

## License:

* GPLv3
