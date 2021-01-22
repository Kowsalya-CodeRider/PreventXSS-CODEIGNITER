
  
  <main id="main">
<br />
  <section id="services" class="services">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>BBProducts</h2>
          <p>Product Details</p>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
			  <img src="<?=base_url();?>Userfiles/<?=$productdata->p_file;?>" width="250" height="250">
            </div>
          </div>
			 <div class="col-lg-6 col-md-6">
			  <br /><br /><br /><br />
			  <h4><strong><?=$productdata->p_price;?> BDT</strong></h4>
			  <h4>Product Name : <strong><?=$productdata->p_name;?></strong></h4>
			  <h4>Product Color : <strong><input type="color" value="<?=$productdata->p_color;?>" readonly></strong></h4>
			  <h4>Product Owner : <strong><?=$productdata->p_name;?></strong></h4>
				
        </div>

      </div>
    </section>
    
  </main><!-- End #main -->

  