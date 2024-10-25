<div>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <!-- Include Tippy.js for tooltips -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>

    <div class="bg-white p-10 rounded-xl">
        <div x-data="{
            events: @js($events),
            initCalendar() {
                let calendarEl = document.getElementById('calendar');
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    events: this.events,
                    eventDidMount: function(arg) {
                        tippy(arg.el, {
                            content: arg.event.extendedProps.description || 'No description',
                            placement: 'top',
                            theme: 'light', // Optional theme for the tooltip
                        });
                    }
                });
                calendar.render();
            }
        }" x-init="initCalendar()">
            <div id="calendar"></div>
        </div>
    </div>
</div>
