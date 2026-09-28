<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_can_be_indexed(): void
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/products');

        $response->assertOk()
            ->assertJsonCount(3);
    }

    public function test_product_can_be_shown(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertOk()
            ->assertJson([
                'id' => $product->id,
                'sku' => $product->sku,
                'name' => $product->name,
            ]);
    }

    public function test_product_can_be_stored(): void
    {
        $data = [
            'sku' => 'SKU-TEST-001',
            'name' => 'Test Product',
            'price' => 1499.990,
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertCreated()
            ->assertJson([
                'sku' => 'SKU-TEST-001',
                'name' => 'Test Product',
            ]);

        $this->assertDatabaseHas('products', [
            'sku' => 'SKU-TEST-001',
            'name' => 'Test Product',
        ]);
    }

    public function test_product_can_be_updated(): void
    {
        $product = Product::factory()->create();

        $data = [
            'sku' => 'SKU-UPDATED-001',
            'name' => 'Updated Product',
            'price' => 1999.990,
        ];

        $response = $this->putJson(
            "/api/products/{$product->id}",
            $data
        );

        $response->assertOk()
            ->assertJson([
                'sku' => 'SKU-UPDATED-001',
                'name' => 'Updated Product',
            ]);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'sku' => 'SKU-UPDATED-001',
            'name' => 'Updated Product',
        ]);
    }

    public function test_product_can_be_destroyed(): void
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}