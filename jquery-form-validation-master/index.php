<!--https://github.com/bnabriss/jquery-form-validation/blob/master/README.md-->
<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $("p").hide();
            });
        });
    </script>

    <style>
        .is-valid{
            border-color: green;
        }

        .is-invalid{
            border-color: red;
        }
    </style>
</head>
<body>
<button>submit</button>
<form>
    <div class="form-group" action="/">
        <label data-validator-label="required" name="required" id="required" class="required">ss</label>
        <input class="form-control" data-validator-label="required" data-validator="required|min:4|max:10" name="hh">

    </div>
</form>


<script src="http://localhost/MyTest/jquery-form-validation-master/dist/jquery.form-validation.min.js"></script>
<script>
//    $(document).on('blur', '[data-validator]', function () {
//        new Validator($(this));
//    });

    $(document).ready(function(){


        Validator.prototype.language = {
            numeric: 'The {label} must be a number.',
            integer: 'The {label} must be an integer.',
            between_numeric: 'The {label} must be between {param0} and {param1}.',
            max_numeric: 'The {label} may not be greater than {param0}.',
            min_numeric: 'The {label} must be at least {param0}.',
            size_numeric: 'The {label} must be {param0}.',
            between: 'The {label} must be between {param0} and {param1} characters.',
            max: 'The {label} may not be greater than {param0} characters.',
            min: 'The {label} must be at least {param0} characters.',
            size: 'The {label} must be {param0} characters.',
            date: 'The {label} must be a date after {param0}.',
            before: 'The {label} must be a date before {param0}.',
            before_or_equal: 'The {label} must be a date before or equal to {param0}.',
            after: 'The {label} must be a date after {param0}.',
            after_or_equal: 'The {label} must be a date after or equal to {param0}.',
            age: 'The age should be more than {param0}.',
            email: 'The  {label} must be a valid email address.',
            in: 'The selected {label} is invalid.',
            not_in: 'The selected {label} is invalid.',
            different: 'The {label} and {otherLabel} must be different.',
            required: 'The {label} field is required..',
            required_if: 'The {label} field is required when {otherLabel} is filled.',
            required_if_val: 'The {label} field is required when {otherLabel} is {param0}',
            same: 'The {label} and {otherLabel} must match.',
            url: 'The {label} format is invalid.',
            regex: 'The {label} format is invalid.'
        }


        $("button").click(function(){
            var Validator11 = new Validator($('[data-validator]'));
//            alert(Validator11.label);
            var lable = Validator11.label;
//            var lable1 = Validator11.language;
//            alert(Validator.prototype.language.lable);
            console.log(Validator11);

//            new Validator($('[data-validator]'), {
//                language : {
//                    required : 'The {label} should have a valid user name with length of {param0}'
//                }
//            });

//            alert(Validator.prototype.language.same);
//        Validator.prototype.required = function () {
//            if (this.val){
//                alert(this.val);
//                return true;
//            }
//            alert(this.val);
//            return false;
//        };



        });
    });
</script>

</body>
</html>


