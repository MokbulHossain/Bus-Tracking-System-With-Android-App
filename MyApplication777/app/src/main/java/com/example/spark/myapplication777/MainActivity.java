package com.example.spark.myapplication777;

import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.os.AsyncTask;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.ProgressBar;
import android.widget.TextView;

import android.os.Bundle;
import android.app.Activity;
import android.content.Context;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;

import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.Statement;
import java.util.ArrayList;

public class MainActivity extends AppCompatActivity implements LocationListener {


    String URL = "http://bus.shunnosoft.com/php_file/update_location.php/";
    String url = "";
    String response = "";

    protected LocationManager locationManager;
    protected LocationListener locationListener;
    protected Context context;
    String lat;
    String provider;
    protected String latitude, longitude;
    protected boolean gps_enabled, network_enabled;
    ProgressBar progressBar;
    Button submit;
    TextView msg;
    String bus_id;
    Thread t;
    ListView listview;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        submit = (Button) findViewById(R.id.submit);
        msg = (TextView) findViewById(R.id.mes);
        listview=(ListView) findViewById(R.id.listview);
        progressBar=(ProgressBar) findViewById(R.id.progressbar);
        progressBar.setVisibility(View.INVISIBLE);
        Bundle bundle=getIntent().getExtras();
        if (bundle != null){
            Intent intent=getIntent();
            bus_id=bundle.getString("bus_id");
            ArrayList<String> list = intent.getStringArrayListExtra("list");
            ArrayAdapter <String> adapter=new ArrayAdapter<String>(this,R.layout.sample_item,R.id.textview,list);
            listview.setAdapter(adapter);
        }
        else{
            Intent intent=new Intent(MainActivity.this,First_Activity.class);
            startActivity(intent);
            finish();
        }


        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);

                LocationAutoUpdateStart();
            }
        });
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater=getMenuInflater();
        menuInflater.inflate(R.menu.manu_layout,menu);
        return super.onCreateOptionsMenu(menu);
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        if (item.getItemId()==R.id.logout){
            Intent intent=new Intent(MainActivity.this,First_Activity.class);
            startActivity(intent);
            finish();
        }
        return super.onOptionsItemSelected(item);
    }
    public  void LocationAutoUpdateStart(){

        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            return;
        }
        //else{msg.setText("location error........");}
        locationManager.requestLocationUpdates(LocationManager.GPS_PROVIDER, 5000, 0, this);
        progressBar.setVisibility(View.VISIBLE);
    }

    @Override
    public void onLocationChanged(Location location) {
       new GetContacts(location.getLatitude(),location.getLongitude()).execute();

    }

    @Override
    public void onProviderDisabled(String provider) {
       // Log.d("Latitude","disable");
        msg.setText("location error........");
        progressBar.setVisibility(View.INVISIBLE);
    }

    @Override
    public void onProviderEnabled(String provider) {
      //  Log.d("Latitude","enable");
        msg.setText("");
        progressBar.setVisibility(View.VISIBLE);
    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {
      //  Log.d("Latitude","status");
    }

    private class GetContacts extends AsyncTask<String, String, String> {

        String newmsg;
        Double leti,longi;

        protected  GetContacts(Double letiti,Double longiti){ leti=letiti; longi=longiti;}
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            //msg.setText("Execute........");


        }

        @Override
        protected String doInBackground(String... arg0) {

            try {
                url = URL + "?leti=" + leti + "&longi=" + longi + "&bus_id=" + bus_id;
                //  System.out.println("URL Insert Biodata : " + url);
                response = call(url);

            } catch (Exception e) {
            }
            return response;

        }

        @Override
        protected void onPostExecute(String newmsg) {
            //msg.setText(newmsg);
        }


        public String call(String url) {
            int BUFFER_SIZE = 5000;
            InputStream in = null;
            try {
                in = OpenHttpConnection(url);

            } catch (IOException e) {
                e.printStackTrace();
                return "";
            }
            InputStreamReader isr = new InputStreamReader(in);
            int charRead;
            String str = "";
            char[] inputBuffer = new char[BUFFER_SIZE];
            try {
                while ((charRead = isr.read(inputBuffer)) > 0) {

                    String readString = String.copyValueOf(inputBuffer, 0, charRead);
                    str += readString;
                    inputBuffer = new char[BUFFER_SIZE];
                }
                in.close();
            } catch (IOException e) {
                // Handle Exception
                e.printStackTrace();
                return "";
            }

            return str;
        }

        private InputStream OpenHttpConnection(String url) throws IOException {
            InputStream in = null;
            int response = -1;
            java.net.URL url1 = new URL(url);
            URLConnection conn = url1.openConnection();
            if (!(conn instanceof HttpURLConnection))
                throw new IOException("Not An Http Connection");
            try {
                HttpURLConnection httpconn = (HttpURLConnection) conn;
                httpconn.setAllowUserInteraction(false);
                httpconn.setInstanceFollowRedirects(true);
                httpconn.setRequestMethod("GET");
                httpconn.connect();
                response = httpconn.getResponseCode();
                if (response == HttpURLConnection.HTTP_OK) {
                    in = httpconn.getInputStream();
                }
            } catch (Exception e) {
                throw new IOException("Error Connection Http");
            }
            return in;
        }

    }


}
