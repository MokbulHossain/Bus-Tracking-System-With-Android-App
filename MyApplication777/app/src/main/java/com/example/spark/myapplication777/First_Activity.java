package com.example.spark.myapplication777;

import android.app.Activity;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.io.*;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.util.ArrayList;
import org.json.JSONObject;
import org.json.*;
import org.json.JSONArray;


public class First_Activity extends Activity {
    String URL = "http://bus.shunnosoft.com/php_file/login.php/";
    String url = "";
    String response = "";
    EditText email, password;
    TextView error;
    Button login;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_first);

        email = (EditText) findViewById(R.id.email);
        password = (EditText) findViewById(R.id.password);
        error = (TextView) findViewById(R.id.error);
        login = (Button) findViewById(R.id.button);
        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (email.getText().toString().trim().length() > 4 && password.getText().toString().trim().length() > 4) {
                    new Getdata().execute();
                    //getBiodataById(1);
                } else {
                    error.setText("Please fillup those information and password more then 4 charecters...");
                }
            }
        });

    }

    private class Getdata extends AsyncTask<String, String, String> {
        String newmsg, emailpass = email.getText().toString(), passwordpass = password.getText().toString();
        Intent intent = new Intent(First_Activity.this, MainActivity.class);
        String data[];
        ArrayList<String> list = new ArrayList<String>();

        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            error.setText("Execute........");
        }

        @Override
        protected String doInBackground(String... arg0) {
            newmsg = getBiodataById(emailpass, passwordpass);
            return newmsg;
        }

        @Override
        protected void onPostExecute(String newmsg) {
            try {
                JSONArray jsonArray = new JSONArray(newmsg);

                String name = null, email = null,contact=null;
                String bus_id=null, license=null,address=null,nid=null;
                for (int i = 0; i < jsonArray.length(); i++) {

                    JSONObject jsonChildNode = jsonArray.getJSONObject(i);
                    bus_id = jsonChildNode.optString("bus_id");
                    name = jsonChildNode.optString("name");
                    email = jsonChildNode.optString("email");
                    contact = jsonChildNode.optString("contact");
                    license = jsonChildNode.optString("license");
                    address = jsonChildNode.optString("address");
                    nid = jsonChildNode.optString("nid");
                }

                list.add("Name : "+name);
                list.add("Email : "+email);
                list.add("Contact : "+contact);
                list.add("License : "+license);
                list.add("Address : "+address);
                list.add("Nid : "+nid);
                intent.putStringArrayListExtra("list", list);
                intent.putExtra("bus_id",bus_id);
                startActivity(intent);
                finish();

               // error.setText(contact);
            } catch (JSONException e) {
                e.printStackTrace();
            }


        }


        //......................................
        public String getBiodataById(String email, String pass) {

            try {
                url = URL + "?email=" + email + "&pass=" + pass;
                //  System.out.println("URL Insert Biodata : " + url);
                response = call(url);

            } catch (Exception e) {
            }
            return response;
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
            URL url1 = new URL(url);
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
