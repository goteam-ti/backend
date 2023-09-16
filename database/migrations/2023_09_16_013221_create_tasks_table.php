<?php

declare(strict_types=1);

use App\Enums\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('title');
            $table->text('description');
            $table->string('status')->default(Status::INCOMPLETE->value);

            $table
            ->foreignUlid('user_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();

            $table->timestamp('due_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
