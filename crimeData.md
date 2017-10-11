---
layout: page
title: Public Data Google Maps Visualization
subtitle: Visualization of Boston's crime data
---

 <div id = "sidebar">
      <br />
      <div class = "sidebar-item">
        <p class = "title">Boston Crime Incident Visualization</p>
        <p class = "text">This web application plots crime incident data across the city of Boston using the Google Maps API and allows users to sort based on different criteria. The data
                          set is open to the public and can be viewed at the <a href="https://data.cityofboston.gov/" target="_blank">CityofBoston.gov</a></p>
      </div>

      <br />
      <br />
      <form>

        <div class = "sidebar-item">
          <div class="form-group">
            <label for="numEntries">Number of entries shown on map: </label>
              <input type="text" id="numEntries" placeholder="Default is 100" class="form-control"/>
          </div>
        </div>
        <div class="sidebar-item">
          <button id="search" type="button" class="btn btn-success" onclick="changeNum()">Show</button>
        </div>

        <br />
        <br />

        <div class = "sidebar-item">
          <p class = "title"> Show only: </p>
          <div class="checkbox">
            <label><input id="shooting" type="checkbox">Shootings</label>
          </div>
        </div>
        <br />
        <div class="sidebar-item">
          <label>District<select class="form-control" id="district">
  					<option></option>
            <option value="A1">A1</option>
            <option value="A15">A15</option>
            <option value="A7">A7</option>
            <option value="B2">B2</option>
            <option value="B3">B3</option>
            <option value="C11">C11</option>
            <option value="C6">C6</option>
            <option value="D14">D14</option>
            <option value="D4">D4</option>
            <option value="E13">E13</option>
            <option value="E18">E18</option>
            <option value="E5">E5</option>
  				</select></label>
        </div>
        <div class="sidebar-item">
          <label>Year<select class="form-control" id="year">
  					<option></option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
  				</select></label>
        </div>
        <div class="sidebar-item">
          <button id="search" type="button" class="btn btn-success" onclick="filter()">Filter</button>
        </div>

        <br />
        <br />
        <br />

        </form>
    </div>
    <div id="map"></div>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVbBLoaOO-qCEt1fuexen4ouXrUeI-eJE&callback=initMap">
    </script>