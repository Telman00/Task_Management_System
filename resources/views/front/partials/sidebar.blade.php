<div class="task p-3 bg-white" style="width: 250px">
    <h5>Task Management</h5>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" id="dashboard-link" href="{{ route('home') }}">
          <i class="bi bi-speedometer2 text-primary"></i> Dashboard
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('tasks.index') }}">
          <i class="bi bi-list-task text-success"></i> Tasks
        </a>
      </li>
    </ul>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('company.index') }}">
          <i class="bi bi-building text-warning"></i> Company
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('projects.index') }}">
          <i class="bi bi-kanban text-info"></i> Projects
        </a>
      </li>
    </ul>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('calendar.index') }}">
          <i class="bi bi-calendar text-primary"></i> Calendar
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="bi bi-trash text-danger"></i> Trash
        </a>
      </li>
    </ul>
  </div>