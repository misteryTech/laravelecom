
<div>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Products</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Product</a></li>
              <li class="breadcrumb-item active">View</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->

        <section class="section">
          <div class="row">
            <div class="col-lg-8">




              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Products</h5>

                  <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">



                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Product</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Out of Stocks</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Inactive</button>
                    </li>
                  </ul>
                  <div class="tab-content pt-2" id="myTabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">






                        <table class="table table-hover table-light datatable">

                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                                @foreach ($viewProducts as $viewProduct)
                              <tr>
                                <th scope="row"><a href="#">{{$viewProduct->id}}</a>
                                  <td>{{$viewProduct->name}}</td>
                                  <td>{{$viewProduct->quantity}}</td>
                                  <td>{{$viewProduct->regular_price}}</td>
                                  <td>{{$viewProduct->created_at->format('y-m-d')}}</td>
                                  <td>

                                    <button @click="$dispatch('edit-mode',{id:{{$viewProduct->id}}})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Edit </button>
                                    {{-- <button wire:click="selectedItem({{$viewProduct->id}}, 'update')" class="btn btn-primary">Edit </button> --}}
                                    <button @click="$dispatch('delete-mode',{id:{{$viewProduct->id}}})" class="btn btn-danger" >Delete </button>
                                </td>

                              </tr>
                              @endforeach
                          </table>
                          {{ $viewProducts->links('pagination::bootstrap-5') }}





                          <div class="modal fade" id="largeModal" tabindex="-1"    data-bs-backdrop="static" wire:ignore.self>
                            <div class="modal-dialog modal-lg" >
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Large Modal</h5>
                                  <button type="button" wire:click="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form class="row g-3"  >

                                                  <!-- Card with an image on left -->
          <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-6">
                <h5 class="card-title">Product Image</h5>
                {{-- @if($product_picture)
                <img src="{{$product_picture->temporaryUrl()}}" width="300px"/>
        @endif --}}
        @if($image)
        <img src="{{ asset('assets/img/products/Products/' . $image) }}" alt="Product Image"  width="300px"/>
    @else
        <p>No image available</p>
    @endif
              </div>


            </div>
          </div><!-- End Card with an image on left -->





                                        <div class="col-md-8">





                                        </div>

                                        <div class="col-md-4">
                                          </div>

                                        <div class="col-md-6">
                                            <label for="inputName5" class="form-label">SKU</label>
                                            <input type="text" class="form-control" wire:model="SKU" id="inputName5">
                                            @error('SKU')
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
                                          <select id="inputState" class="form-select" wire:model="category_id">
                                            <option>--SELECT CATEGORY--</option>

                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                            <input type="text" class="form-control" id="inputName5"  wire:model="price">
                                            @error('price')
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

                                </div>
                                <div class="modal-footer">
                                  <button type="button" wire:click="close" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="button"  wire:click="update" class="btn btn-primary">Save changes</button>
                                </div>
                            </form><!-- End Multi Columns Form -->

                              </div>
                            </div>
                          </div><!-- End Vertically centered Modal-->



                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">
                      Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="contact-tab">
                      Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                    </div>
                  </div><!-- End Pills Tabs -->

                </div>
              </div>

            </div>

            <div class="col-lg-4">


              <div class="card">
                <div class="card-body">


                    <h5 class="card-title">List Categories</h5>

                    <table id="datatable" class="table table-hover table-light datatable">

                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>


                        </thead>

                        <tbody>
                            @foreach ($selectCategory as $selectCategorya)
                          <tr>
                            <th scope="row"><a href="#">{{$selectCategorya->id}}</a>
                              <td>{{$selectCategorya->name}}</td>
                          </tr>
                          @endforeach


                        </table>




                  <!-- End Vertical Pills Tabs -->

                </div>

              </div>

            </div>

          </div>
        </section>

      </main><!-- End #main -->
  </div>
  <script>
    document.addEventListener('livewire:initialized',()=>{
        @this.on('swal',(event)=>{
            const data=event
            swal.fire({
                icon:data[0]['icon'],
                title:data[0]['title'],
                text:data[0]['text'],

            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "{{ route('view.products') }}";
                }
            })
        })

        @this.on('confirmedelete',(event)=>{
            const data=event
            swal.fire({
                icon:data[0]['icon'],
                title:data[0]['title'],
                text:data[0]['text'],

            }).then((result)=>{
                if(result.isConfirmed){
                    window.location.href = "{{ route('view.products') }}";
                }
            })
        })


        @this.on('delete-prompt',(event)=>{

            const data=event
            $id =data[0]['id'];
            swal.fire({
                title:data[0]['title'],
                text:data[0]['text'],
                icon:data[0]['icon'],
                showCancelButton:true,
                conFirmButtonColor:'#3085d6',
                showCancelButtonColor:'#d33',
                conFirmButtonColor:'Yes, Delete IT!',

            }).then((result)=>{
                    if(result.isConfirmed){
                        @this.call('confirmDelete',$id);

                        @this.on('deleted',(event)=>{
                swal.fire({
                    title:'Deleted',
                    text:'Deleted',
                    icon:'Success',
                })

            })

                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Handle the cancellation action here
                    // For example, redirect to a specific route
                    window.location.href = "{{ route('view.products') }}";
                }
            })
        })
    });
</script>
