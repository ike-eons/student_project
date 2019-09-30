<template>
    <div class="modal fade" id="addRegisterModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- modal header-->
                <div class="modal-header bg-success text-white">
                    <h4 class="modal-title" id="addPostModalLabel">Subject Registration</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>

                !-- modal body-->
                <div class="modal-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Code </th>
                                <th> Name </th>
                                <th> Credit Hours </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>

                    </table>
                </div>
    
            </div>
        </div>
    </div>

</template>

<script>
  export default {
    name: "subject-registrations",
    props: ['studentid'],
    data()
        {
            return {
            }
        },
    created: function(){

    },
    methods:{

    }
}
</script>