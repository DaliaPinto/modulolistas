@include('admin.include.createperiod')
@section('head')
    <style>
        .font-awe {
            font-family: 'Roboto', FontAwesome, sans-serif;
        }
        .input-txt{
            border: 0px;
            width: 120px;
            font-size: 9pt;
        }
        .hide {
            display: none;
        }
        .show{
            display: inline;
        }
    </style>
@endsection
<div class="col-xs-2">
    <div class="row">
        Horarios Creados
    </div>
</div>
<!--Header table schedules-->
<div class="col-xs-10" id='schedules'>
    <div class="row" style="margin-bottom: 20px">
        Horario asignado al grupo
        <input type="text" @keyup="search" placeholder="&#xF002; Elija Grupo" class="font-awe input-txt"/>
        <ul>
            <li v-for="s in subjects">
                @{{ s.name }}
            </li>
        </ul>
    </div>
    <table id="schedule-table" class="table">
    <thead>
        <tr>
            <th>Hora</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hours as $i=>$hour)
        <tr>
            <td class="border-div txt-align-center">{{ $hour->hour }}</td>
            @for($i=0; $i<5; $i++)
                <td is="search-schedule"></td>
            @endfor
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<script id="searchTemplate" type="text/template">
    <td class="border-div txt-align-center">
        <div v-if="search">Cargando...</div>
        <input type="text" placeholder="&#xF002; Elija Docente" v-model="teacher" class="font-awe teacher input-txt"/>
        <input type="text" placeholder="&#xF002; Elija Materia" class="font-awe subject input-txt"/>
        <ul>
            <li v-for="teach in teachers" @click="showTeacher(teach)">
                @{{teach.name + teach.last_name}}
            </li>
        </ul>
    </td>
</script>
@section('javascript')
    {{--<script src="{{URL::to('/js/jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::to('/js/jquery-min/jquery.min.js')}}" type="text/javascript"></script>--}}
    {{--<script src="{{URL::to('/js/jquery/jquery-ui.js')}}" type="text/javascript"></script>--}}
    <script>
        //datepicker
        /*$(function() {
            $("#datepicker-start, #datepicker-end").datepicker({
                dateFormat: 'yy-mm-dd'
            });
        });*/

        let subjects = {!! $subjects !!};
        let teachers = {!! $teachers !!};
        let groups = {!! $groups !!};


        Vue.component('search-schedule', {
            template: '#searchTemplate',
            data() {
                return {
                    search: false,
                    teacher: '',
                    teachers: []
                }
            },
            methods: {
                showTeacher(t) {
                    this.teacher = t.name + ' ' + t.last_name + ' ' + t.middle_name;
                }
            },
            watch: {
                'teacher': function (val) {
                    let self = this;
                    console.log(val);
                    axios.post('/getTeachersByName', {
                        valor: val
                    }).then((response) => {
                        console.log(response.data);
                        self.teachers = response.data.teachers;
                    });
                }
            }
        });


        new Vue({
            el: '#schedules',
            data:{
                subject: subjects,
                teacher: teachers,
                group: groups
            },
            methods: {
                search: function (event) {
                    let self = this; //data
                    let value = event.target.value;
                    return this.subject.filter(function (value) {
                        return value.name.indexOf(self.name) >= 0;
                    })
                }
            }

        });

    </script>
@endsection
