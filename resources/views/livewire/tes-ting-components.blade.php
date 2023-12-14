
<div>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Example Card</h5>

    <ul>
        @foreach ($categories as $category)
            <li>
                {{ $category->name }}: {{ $category->products_count }}
            </li>
        @endforeach
    </ul>
            </div>
          </div>

        </div>

        <div class="col-lg-6">





  <!-- Website Traffic -->
  <div class="card">


    <div class="card-body pb-0">
      <h5 class="card-title">Website Traffic <span>| Today</span></h5>

      <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

      <script>

const cats = @json($categories);
const namess = cats.map(data => data.name);
const products_count = cats.map(data => data.products_count);


const dataArr = cats.map(data => ({
                value:data.products_count,
                name: data.name
            }));



        document.addEventListener("DOMContentLoaded", () => {
          echarts.init(document.querySelector("#trafficChart")).setOption({
            tooltip: {
              trigger: 'item'
            },
            legend: {
              top: '5%',
              left: 'center'
            },
            series: [{
              name: 'Access From',
              type: 'pie',
              radius: ['40%', '70%'],
              avoidLabelOverlap: false,
              label: {
                show: false,
                position: 'center'
              },
              emphasis: {
                label: {
                  show: true,
                  fontSize: '18',
                  fontWeight: 'bold'
                }
              },
              labelLine: {
                show: false
              },
              data:dataArr
            }]
          });
        });
      </script>

    </div>
  </div><!-- End Website Traffic -->


        </div>
      </div>
    </section>

  </main><!-- End #main -->
</div>
