<!-- Bootstrap and necessary plugins -->
<script src="{{url('assets/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{url('assets/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/node_modules/pace-progress/pace.min.js')}}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{url('assets/node_modules/chart.js/dist/Chart.min.js')}}"></script>

<!-- CoreUI main scripts -->

<script src="{{url('assets/js/app.js')}}"></script>

<!-- Plugins and scripts required by this views -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.14/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.0/vue-resource.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js "></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap4.min.js"></script>
@yield('additional-scripts')
