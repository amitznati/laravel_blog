@extends('layouts/main')
    
    @section('title','| Contact')
    
    @section('content')
    
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Me</h1>
                <hr>
                <form action="{{ url('contact')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label name="email">Email:</label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label name="subject">Subject:</label>
                        <input type="text" name="subject" class="form-control"/>
                    </div>
                    
                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" class="form-control" placeholder="Message goes here..."></textarea>
                    </div>
                    
                    <input type="submit" value="Send Message" class="btn btn-success"/>
                </form>
            </div>
        </div>

    @endsection