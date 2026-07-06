<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Customer Registration</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

    <style>

        body{
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg,#e3f2fd,#f1f8e9);
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-box{
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .register-box h2{
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #333;
        }

        .form-label{
            font-weight: 600;
            color: #444;
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
            border: 1px solid #ddd;
            padding-left: 15px;
        }

        .form-control:focus{
            box-shadow: none;
            border-color: #28a745;
        }

        .btn-home{
            height: 50px;
            border-radius: 12px;
            font-weight: bold;
            border: none;
            background: #212529;
            color: #fff;
            transition: 0.3s;
        }

        .btn-home:hover{
            background: #000;
        }

        .btn-register{
            height: 50px;
            border-radius: 12px;
            font-weight: bold;
            border: none;
            background: #28a745;
            color: #fff;
            transition: 0.3s;
        }

        .btn-register:hover{
            background: #218838;
        }

        .bottom-text{
            text-align: center;
            margin-top: 25px;
            color: #555;
        }

        .bottom-text a{
            text-decoration: none;
            font-weight: bold;
            color: #198754;
        }

        .bottom-text a:hover{
            text-decoration: underline;
        }

        .icon{
            margin-right: 8px;
            color: #198754;
        }

    </style>
</head>
<body>

    <div class="register-box">

        <h2>
            <i class="fa-solid fa-user-plus icon"></i>
            Customer Registration
        </h2>

        <form action="{{url('/customer/registration-store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Enter your full name"
                       required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Enter your email address"
                       required>
            </div>
<!-- Password-->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Enter your password"
                       required>
            </div>
            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel"
                       name="phone"
                       class="form-control"
                       placeholder="Enter your phone number"
                       required>
            </div>

            <!-- Image -->
            <div class="mb-4">
                <label class="form-label">
                    Profile Image (Optional)
                </label>

                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <!-- Buttons -->
            <div class="row g-2">

                <div class="col-6">
                    <a href="/" class="btn btn-home w-100 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-house me-2"></i>
                        Home
                    </a>
                </div>

                <div class="col-6">
                    <button type="submit" class="btn btn-register w-100">
                        Register Now
                    </button>
                </div>

            </div>

        </form>

        <!-- Bottom Text -->
        <div class="bottom-text">
            Already have an account?
            <a href="{{url('customer/login')}}">Login</a>
        </div>

    </div>

</body>
</html>