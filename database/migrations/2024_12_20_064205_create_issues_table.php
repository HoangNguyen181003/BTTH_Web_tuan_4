<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // Tạo cột id (Primary Key)
            $table->foreignId('computer_id') // Khóa ngoại tham chiếu đến computers.id
                  ->constrained('computers')
                  ->onDelete('cascade');
            $table->string('reported_by', 50)->nullable(); // Người báo cáo (có thể null)
            $table->dateTime('reported_date'); // Thời gian báo cáo
            $table->text('description'); // Mô tả chi tiết vấn đề
            $table->enum('urgency', ['Low', 'Medium', 'High']); // Mức độ sự cố
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // Trạng thái sự cố
            $table->timestamps(); // Tự động thêm created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('issues');
    }
}

