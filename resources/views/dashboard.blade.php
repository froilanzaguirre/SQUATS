<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

<style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body,
            input {
            font-family: "Poppins", sans-serif;
            }

            .container{
                width: 100vw;
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap:15.2rem;
                padding: 0 2rem;
                overflow: hidden;
                position: relative;
            }

            .img{
                display: flex;
                justify-content: flex-end;
                align-items: center;
                z-index: 6;
                padding-top:70px;
            }

            .img img{
                width: 500px;
            }
             .img1{
                display: flex;
                justify-content: flex-end;
                align-items: center;
                z-index: 6;
            }

            .img1 img{
                width: 450px;
            }

            .left-container {
                position: absolute;
                top: 50%;
                transform: translate(-50%, -50%);
                left: 70%;
                width: 50%;
                transition: 1s 0.7s ease-in-out;
                display: grid;
                grid-template-columns: 1fr;
                z-index: 5;
                }

            form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0rem 5rem;
            transition: all 0.2s 0.7s;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            }

            form.left-form {
            z-index: 2;
            }

            .btn {
            width: 150px;
            background-color: #5995fd;
            border: none;
            outline: none;
            height: 35px;
            border-radius: 10px;
            color: #000000;
            text-transform: uppercase;
            font-weight: 600;
            margin: 10px 0;
            padding-top: 7px;
            padding-bottom: 5px;
            cursor: pointer;
            transition: 0.5s;
            }

            .btn:hover {
            background-color: #4d84e2;
            }

            .container:before {
            content: "";
            position: absolute;
            height: 2000px;
            width: 2000px;
            top: 43%;
            right: 57%;
            transform: translateY(-50%);
            background-color:#65B0BD;
            transition: 1.8s ease-in-out;
            border-radius: 10%;
            z-index: 6;
            }
        
            h2{
            margin: 1px 0;
            color:  #1C2833;
            font-size: 2rem;
            }

            .btn{
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 21px;
            outline: none;
            border: none;
            background-color:#21618C;
            background-size: 200%;
            font-size: 1.5rem;
            padding-top: 11px;
            padding-bottom: 5px;
            color: white;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
            }

            .btn:hover {
            background-color: #1988D1;
            }

          
</style>

    </head>
    <body class="antialiased">
    <div class="container">
		<div class="img">
			<img src="images/bg.png">
		</div>
         
      <div class="forms-container">
        <div class="left-container">
          <form action="#" class="left-form">
          <div class="img1">
			<img src="images/squats-bg.png">
		</div>
        <br><br><br>
</x-app-layout>
