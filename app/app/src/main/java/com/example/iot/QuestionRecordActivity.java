package com.example.iot;

import android.app.Activity;
import android.app.Fragment;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by admin on 2017/5/5.
 */

public class QuestionRecordActivity extends Activity {
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_question_record);
        getData();
    }

    private void getData() {
        String url = "http://140.138.152.207/atm/iot/android/getQuestionData.php?user=123";

        StringRequest stringRequest = new StringRequest(url, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d("1231231", response);
                showJSON(response);
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(getApplicationContext(),error.getMessage().toString(),Toast.LENGTH_LONG).show();
                    }
                });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void showJSON(String response){
        try {
            JSONObject jsonObject = new JSONObject(response);
            JSONArray result = jsonObject.getJSONArray("result");

            requestData(result);

        } catch (JSONException e) {
            e.printStackTrace();
        }
    }

    private void requestData(JSONArray array) {
        ArrayList<HashMap<String, String>> datas = new ArrayList<HashMap<String,String>>();
        for(int i = 0; i < array.length(); i++){
            try{
                JSONObject collegeData = array.getJSONObject(i);
                HashMap<String, String> item = new HashMap<String, String>();
                item.put("value", collegeData.getString("value"));
                item.put("time", collegeData.getString("time"));
                int score = Integer.parseInt(collegeData.getString("value"));
                String[] types = {"絕對夜晚型", "中度夜晚型", "中間型", "中度清晨型", "絕對清晨型"};
                String type = "";
                if(score >= 16 && score <= 30)
                    type = types[0];
                else if(score >= 31 && score <= 41)
                    type = types[1];
                else if(score >= 42 && score <= 58)
                    type = types[2];
                else if(score >= 59 && score <= 69)
                    type = types[3];
                else if(score >= 70 && score <= 86)
                    type = types[4];
                item.put("type", type);
                datas.add(item);
            }catch  (JSONException e) {
                e.printStackTrace();
            }
        }

        ListView lvProduct = (ListView) findViewById(R.id.lv_products);
        MultiExpandAdapter adapter = new MultiExpandAdapter(this, datas);
        lvProduct.setAdapter(adapter);
    }
}
