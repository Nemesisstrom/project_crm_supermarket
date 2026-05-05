public function up(): void
{
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('phone');
        $table->string('alamat');
        $table->timestamps(); // ini otomatis buat created_at & updated_at
    });
}

public function down(): void
{
    Schema::dropIfExists('customers');
}