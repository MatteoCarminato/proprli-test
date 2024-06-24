<?php

namespace Tests\Feature;

use App\Models\Construction;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_successful_response_for_root_route()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_create_a_comment()
    {
        $construction = Construction::factory()->create();

        $taskData = [
            'title' => 'Teste Titulo',
            'description' => 'Teste Proprli',
            'status' => 'open',
            'construction_id' => $construction->id,
        ];

        $task = Task::create($taskData);

        $data = [
            'content' => 'Conteúdo do novo comentário',
        ];

        $response = $this->postJson("/api/tasks/{$task->id}/comments", $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'content',
                    'created_at',
                    'updated_at',
                ],
            ]);

        $this->assertDatabaseHas('comments', [
            'content' => $data['content'],
            'task_id' => $task->id,
        ]);
    }
}
