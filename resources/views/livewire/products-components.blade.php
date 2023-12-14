
<div>
    <main id="main" class="main">

      <div class="pagetitle">
        <h1>Products</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Product</a></li>
            <li class="breadcrumb-item active">Add Product</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->

      <section class="section">
        <div class="row">
          <div class="col-lg-7">


            <div class="card">
                <div class="card-body">


                  <h5 class="card-title">Products Details</h5>

                  @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                  @endif
                  <!-- Multi Columns Form -->
                  <form class="row g-3" wire:submit.prevent="addProduct">


                       <!-- Card with header and footer -->

          <!-- Card with an image on left -->
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">

                @if($product_picture)
                <img src="{{$product_picture->temporaryUrl()}}" width="300px"/>
        @endif

              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Product Image</h5>
                  <p class="card-text">Please use high quality images for product.</p>
                </div>
              </div>
            </div>
          </div><!-- End Card with an image on left -->




                    <div class="col-md-8">

                      <input type="file" class="form-control" name="product_picture" wire:model="product_picture"  id="inputName5">
                        @error('product_picture')
                            <p class="text-danger">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="col-md-4">
                      </div>

                    <div class="col-md-6">
                        <label for="inputName5" class="form-label">SKU</label>
                        <input type="text" class="form-control" wire:model="sku" id="inputName5">
                        @error('sku')
                        <p class="text-danger">{{$message}}</p>
                    @enderror

                      </div>

                      <div class="col-md-6">
                        <label for="inputName5" class="form-label">Name</label>
                        <input type="text" class="form-control" wire:model="name" id="inputName5">
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                          @enderror
                      </div>



                    <div class="col-md-8">
                      <label for="inputEmail5" class="form-label">Description</label>
                      <input type="text" class="form-control" wire:model="description" id="inputEmail5">
                      @error('description')
                      <p class="text-danger">{{$message}}</p>
                       @enderror
                    </div>



                    <div class="col-md-4">
                      <label for="inputPassword5" class="form-label">Category</label>
                      <select id="inputState" class="form-select" wire:model="category" name="category">
                        <option>--SELECT CATEGORY--</option>
                        @foreach ($selectCategory as $selectCategoriess )
                        <option value="{{$selectCategoriess->id}}">{{$selectCategoriess->name}}</option>
                        @endforeach
                      </select>
                      @error('category')
                      <p class="text-danger">{{$message}}</p>
                  @enderror

                    </div>

                    <div class="col-md-4">
                        <label for="inputName5" class="form-label">Regular Price</label>
                        <input type="text" class="form-control" id="inputName5" wire:model="reg_price">
                        @error('reg_price')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                      </div>

                      <div class="col-md-4">
                        <label for="inputName5" class="form-label">Sale Price</label>
                        <input type="text" class="form-control" id="inputName5"  wire:model="sale_price">
                        @error('sale_price')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                      </div>



                      <div class="col-md-4">
                        <label for="inputName5" class="form-label" >Quantity</label>
                        <input type="text" class="form-control" id="inputName5" wire:model="quantity">
                        @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                         @enderror
                      </div>



                      <div class="col-md-4">
                        <label for="inputName5" class="form-label" >Stock Status</label>
                        <select id="inputState" class="form-select" wire:model="stock_stats">
                            <option value="instock">Instock</option>
                            <option value="outofstock">Out of Stock</option>
                          </select>
                          @error('stock_stats')
                          <p class="text-danger">{{$message}}</p>
                           @enderror
                      </div>




                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                  </form><!-- End Multi Columns Form -->





                </div>
              </div>





          </div>

          <div class="col-lg-5">
            <div class="card">


         <div class="card-body">

           <h5 class="card-title">Product Activity <span>| Today</span></h5>

           <table class="table">
            <thead>
              <tr>
                <th scope="col">SKU</th>
                <th scope="col">Time</th>
                <th scope="col">Product</th>
                <th scope="col">event</th>
                <th scope="col">Date</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($logsWithProducts as $logsWithProduct)
              <tr>
                <th scope="row">{{$logsWithProduct->SKU}}</th>
                <td>{{$logsWithProduct->created_at->format('h:i A')}}</td>
                <td> {{$logsWithProduct->name}}</td>
                <td>{{$logsWithProduct->event}}</td>
                <td>{{$logsWithProduct->created_at->format('M-y-d')}}</td>
              </tr>

              @endforeach


            </tbody>
          </table>
          {{-- {{$logsWithProducts->links('pagination::bootstrap-5')}} --}}

         </div>

       </div><!-- End Recent Activity -->

        </div>
      </section>

    </main><!-- End #main -->
  </div>
