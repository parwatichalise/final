<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .top-bar {
            background-color: #007bff;
            color: white;
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1;
            display: flex;
            justify-content: space-between;
        }
        .top-bar h3 {
            margin: 0;
            display: inline-block;
        }

        .user-icon {
            display: inline-block;
            position: relative;
        }
        .hover-menu {
            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid #ddd;
            z-index: 1000;
            right: 0;
            width: 150px;
        }
        .user-icon:hover .hover-menu {
            display: block;
        }
        .hover-menu a {
            color: black;
            padding: 10px;
            text-decoration: none;
            display: block;
        }
        .hover-menu a:hover {
            background-color: #007bff;
            color: white;
        }
        .user-info {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .user-info .user-name {
            display: flex;
            align-items: center;
        }
        .user-info .user-name span {
            margin-right: 8px;
        }
        .user-info .user-name .fas {
            font-size: 30px;
        }
        .user-info span.role {
            margin-left: 0px;
        }

        .content {
            padding: 100px 20px 20px 20px; 
            text-align: center;
        }

        .my-4{
            color: #448EE4;
            font-weight: bold ;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <h3>Online Test</h3>
        <div class="user-icon">
            <div class="user-info">
            <div class="user-name">
                <span>{{ auth()->user()->username }}</span> 
                
                @if(auth()->user()->image) 
                    <img src="{{ Storage::url(auth()->user()->image) }}" alt="User Image" class="user-profile-img" style="width: 30px; height: 30px; border-radius: 50%;">
                @else
                    <i class="fas fa-user-circle"></i> 
                @endif
            </div>
                <span class="role">Student</span>
            </div>
            <div class="hover-menu">
                <a href="{{ route('profile') }}">Profile</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    <a href="#" class="nav-link" id="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="content">
        <h2 class="text-center my-4">Exam</h2>
         <div class="user-name">
                @if(auth()->user()->image)
                    <img src="{{ Storage::url(auth()->user()->image) }}" alt="User Image" class="user-profile-img" style="width: 120px; height: 120px; border-radius: 50%;">
                @else
                    <i class="fas fa-user-circle"></i>
                @endif
            </div>
            <div class="card-body">
    <h5>Your Exam ID: {{ $examId }}</h5>
    <p class="card-text"><strong>Name of Student:</strong> {{ auth()->user()->username }}</p>
    <p class="card-text"><strong>Exam Title: {{ $examTitle }}</strong></p>
    <a href="{{ route('start.exam', ['examTitle' => $examTitle]) }}" 
       class="btn btn-primary" 
       onclick="startExamTimer()">Get Started</a>
    <a href="{{ route('student.dashboard') }}" class="btn btn-secondary">Cancel</a>
</div>


        </div>
        <div class="alert alert-info mt-4">
            <strong>Note:</strong>
            <ol>
                <li>If the internet disconnects during the exam, it will be counted but the result will not be saved.</li>
                <li>You can either answer or leave the questions, and it will be marked as not attempted.</li>
            </ol>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
    
    <script>
    function startExamTimer() {
        localStorage.removeItem('startTime');
        localStorage.removeItem('timeRemaining');
        localStorage.removeItem('solvedCount');        
        localStorage.removeItem('unsolvedCount');      
        localStorage.removeItem('selectedOptions');   

        localStorage.setItem('startTime', Date.now());
    }
</script>

</body>
</html>