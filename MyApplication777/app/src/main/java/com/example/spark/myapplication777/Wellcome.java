package com.example.spark.myapplication777;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ProgressBar;

public class Wellcome extends AppCompatActivity {
    private ProgressBar progressBar;
    private int progress;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wellcome);
        progressBar=(ProgressBar) findViewById(R.id.progressbar);

        Thread thread=new Thread(new Runnable() {
            @Override
            public void run() {
                doit();
                Intent intent=new Intent(Wellcome.this,First_Activity.class);
                startActivity(intent);
                finish();
            }
        });
        thread.start();
    }
    public void doit(){
        try{
            for(progress=20;progress<=100;progress=progress+20) {
                Thread.sleep(1000);
                progressBar.setProgress(progress);
            }
        }
        catch (Exception e){

        }

    }
}
