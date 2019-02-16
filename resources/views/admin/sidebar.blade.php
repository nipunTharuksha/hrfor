<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin') }}">
                        Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('index') }}">
                        Users
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/paevalu/designation') }}">
                        Add Designation
                    </a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/mainplant') }}">
                        Add plant
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
