package com.example.iot;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import org.w3c.dom.Text;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * 点击item展开隐藏部分,再次点击收起 可展开多条 Item
 *
 * @author WangJ
 * @date 2016.02.01
 */



public class MultiExpandAdapter extends BaseAdapter {
    private Context context;
    private ArrayList<HashMap<String, String>> list;
    private boolean[] showControl; // 用一个布尔数组记录list中每个item是否要展开

    public MultiExpandAdapter(Context context,
                              ArrayList<HashMap<String, String>> list) {
        super();
        this.context = context;
        this.list = list;
        showControl = new boolean[list.size()]; // 构造器中初始化布尔数组
    }

    @Override
    public int getCount() {
        return list.size();
    }

    @Override
    public Object getItem(int position) {
        return list.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }


    @Override
    public View getView(final int position, View convertView, ViewGroup parent) {
        ViewHolder holder = null;
        if (convertView == null) {
            holder = new ViewHolder();
            convertView = LayoutInflater.from(context).inflate(R.layout.activity_item,
                    parent, false);


            holder.showArea = (RelativeLayout)convertView.findViewById(R.id.layout_showArea);
            holder.hideArea = (RelativeLayout)convertView.findViewById(R.id.layout_hideArea);
            holder.tvDate = (TextView)convertView.findViewById(R.id.tv_Date);
            holder.tvScoreTitle = (TextView)convertView.findViewById(R.id.tv_score_title);
            holder.tvScore = (TextView)convertView.findViewById(R.id.tv_score);
            holder.tvTime = (TextView)convertView.findViewById(R.id.tv_time);
            holder.tvType = (TextView)convertView.findViewById(R.id.tv_type);
            convertView.setTag(holder);
        } else {
            holder = (ViewHolder) convertView.getTag();
        }


        final HashMap<String, String> item = list.get(position);

        // 注意：我们在此给响应点击事件的区域（我的例子里是 showArea 的线性布局）添加Tag，
        // 为了记录点击的 position，我们正好用position 设置 Tag
        holder.showArea.setTag(position);

        holder.tvDate.setText(item.get("time"));
        holder.tvScoreTitle.setText(item.get("value"));
        holder.tvScore.setText(item.get("value"));
        holder.tvTime.setText(item.get("time"));
        holder.tvType.setText(item.get("type"));
        // list依次加载每个item，加载的同时查看showControl控制数组中对应位置的true/false
        // true显示隐藏部分
        // false不显示
        if (showControl[position]) {
            holder.hideArea.setVisibility(View.VISIBLE);
        } else {
            holder.hideArea.setVisibility(View.GONE);
        }

        holder.showArea.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // 根据点击位置改变控制数组中对应位置的布尔值
                int tag = (Integer) view.getTag();
                // 如果已经是true则改为false，反过来同理（即点击展开，再次点击收起）
                if (showControl[tag]) {
                    showControl[tag] = false;
                } else {
                    showControl[tag] = true;
                }
                //通知adapter数据改变需要重新加载
                notifyDataSetChanged(); //必须要有一步
            }
        });

        // 对于 Item 中子控件的监听（区别于整个Item）都是在适配器类中添加，
        // 不要和在Activity中给ListView添加setOnItemClickListener搞混了
        return convertView;
    }

    class  ViewHolder{
        RelativeLayout showArea;
        RelativeLayout hideArea;
        TextView tvDate;
        TextView tvScoreTitle;
        TextView tvScore;
        TextView tvTime;
        TextView tvType;
    }
}