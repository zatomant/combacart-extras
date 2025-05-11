 /**
 * goods_tmplt
 *
 * Goods template
 *
 * @category        templates
 * @name            goods_tmplt
 * @desctiption     Goods template
 * @internal        @type 1
 * @internal        @lock_template 0
 * @internal        @modx_category Comba
 * @internal        @installset base
 */
 <!doctype html>
 <html {{html_lang}}>
 <head>
     <title>[*pagetitle*] | [(site_name)]</title>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="keywords" content="">
     <meta name="description" content="[*description*]">
     <meta name="robots" content="index,follow">
     <base href="[(site_url)][(__page_root)]">
 </head>
 <body>
 <div class="wrapper">

  [!CombaHeader!]
  <div class="container">
   <div class="row">
    <div class="col">
     <section>
      <h2>[*longtitle*]</h2>
      <p>[*description*]</p>
      [[CombaFunctions? &fnct=`showSeller` &seller=`[*goods_seller*]`]]
      <form>
       <input type="hidden" name="goodsid" value="[*id*]">
       <input type="hidden" name="goodslguid" value="[[CombaFunctions? &fnct=`goodslguid` &string=`[*id*]_[*goods_code*]`]]">
       <a href="[(site_url)][[CombaFunctions? &fnct=`GetImage` &preset=`image-max`]]" class="venobox" data-gall="images" title="[*pagetitle*]">
        <picture>
         <!-- webp зображення-->
         <source
                 srcset="[(site_url)][[CombaFunctions? &fnct=`GetImage` &phpthumb=`webp=1` &preset=`page-goods-3`]]"
                 data-fullsize="[(site_url)][[CombaFunctions? &fnct=`GetImage` &phpthumb=`webp=1` &preset=`image-max`]]"
                 type="image/webp">
         <!-- маленьке webp зображення-->
         <source srcset="[(site_url)][[CombaFunctions? &fnct=`GetImage` &phpthumb=`webp=1` &preset=`page-goods-2`]]" media="(max-width: 350.99px)" type="image/webp" />
         <!-- стандартне jpg/png зображення-->
         <img loading="lazy"
              data-src="[(site_url)][[CombaFunctions? &fnct=`GetImage` &preset=`page-goods-3` &oper=`lazy`]]"
              data-fullsize="[(site_url)][[CombaFunctions? &fnct=`GetImage` &preset=`image-max`]]"
              class="lazy img-fluid pe-1 rounded-lg">
        </picture>
       </a>

       <p class="h5 fw-bold mb-3">
        [[CombaFunctions? &fnct=`is` &cond=`[*goods_price*];[*goods_avail*]` &then=`
        <span class="text-info fw-light me-1"><s class="goodspriceold">[*goods_price_old*]</s></span>
        <span content="[*goods_price*]" class="goodsprice pe-1">[*goods_price*]</span>
        <span>[+currency+]</span>
        `]]
       </p>

       [[CombaFunctions? &fnct=`buttonbuy` &avail=`[*goods_avail*]` &price=`[*goods_price*]` &old=`[*goods_price_old*]` &ondem=`[*goods_isondemand*]` &class=`mainbuybutton col-md-6`]]
       <div class="my-2 small">[(__goods_code_title)]: <span id="gdscode-[*id*]" class="goodscode">[*goods_code*]</span></div>
      </form>
     </section>

     [*#content*]
    </div>
   </div>
  </div>
 </div>

 [[CombaFooter]]

 </body>
 </html>