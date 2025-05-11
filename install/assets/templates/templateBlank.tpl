 /**
 * Blank_tmplt
 *
 * Blank template
 *
 * @category        templates
 * @name            blank_tmplt
 * @desctiption     Blank template
 * @internal        @type 1
 * @internal        @lock_template 0
 * @internal        @modx_category Comba
 * @internal        @installset base
 */
 <!DOCTYPE html>
 <html {{html_lang}}>
 <head>
     <title>[*pagetitle*] | [(site_name)]</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="[*description*]">
     <meta name="robots" content="index,follow">
     <base href="[(site_url)][(__page_root)]">
     <style>
         input[type="radio"]:checked + label > span {
             display: block;
         }

         input[type="radio"] + label > span {
             display: none;
         }
     </style>
 </head>
 <body>
 <div class="wrapper">

     [!CombaHeader!]

     <div class="container">
         <div class="row">
             <div class="col">
                 [*content*]
             </div>
         </div>
     </div>
 </div>

 [[CombaFooter]]

 </body>
 </html>