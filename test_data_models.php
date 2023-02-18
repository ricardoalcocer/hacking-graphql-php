<?php
    use App\Models\Artist;
    use App\Models\Event;
    use App\Models\EventFormat;
    use App\Models\Host;
    use App\Models\Venue;
    use App\Models\VenuePhoto;

    include "dbboot.php";

    // $artist = Artist::all();
    // print_r(json_encode($artist->toArray()));

    // $event = Event::all();
    // print_r(json_encode($event->toArray()));

    // $eventformat = EventFormat::all();
    // print_r(json_encode($eventformat->toArray()));

    // $host = Host::all();
    // print_r(json_encode($host->toArray()));

    // $venue = Venue::all();
    // print_r(json_encode($venue->toArray()));

    // $venuephoto = VenuePhoto::all();
    // print_r(json_encode($venuephoto->toArray()));

    // $event = Event::with('artist')->with('host')->with('venue')->with('format')->first();
    // print_r(json_encode($event->toArray()));

    // $venue = Venue::with('host')->first();
    // print_r(json_encode($venue->toArray()));

    // lazy
    // $event = Event::first();
    // print_r(json_encode($event->artist()->toArray()));

    // eager
    // $event = Event::with('artist')->first();
    // print_r(json_encode($event->toArray()));