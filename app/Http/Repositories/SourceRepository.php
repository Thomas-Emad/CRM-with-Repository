<?php

namespace App\Http\Repositories;

use App\Models\source;
use App\Interfaces\SourceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SourceRepository implements SourceRepositoryInterface
{
    /**
     * Retrieve all sourcees with their ID, name, and color.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(string $title = ''): Collection
    {
        return source::select(['id', 'name', 'website', 'description'])->where('name', 'like', "%$title%")->get();
    }

    /**
     * Retrieves a source by its ID.
     *
     * @param int $id The ID of the source to retrieve.
     *
     * @return \App\Models\source|null The source if found, otherwise null.
     */
    public function get(int $id): ?source
    {
        return source::select(['id', 'name', 'website', 'description'])->findOrFail($id);
    }

    /**
     * Stores a new source using the given attributes.
     *
     * @param array $attributes The attributes for creating the source.
     *
     * @return bool True if the source was successfully created, otherwise false.
     */

    public function store(array $attributes): source
    {
        return source::create($attributes);
    }

    /**
     * Updates a source by its ID.
     *
     * @param int $id The ID of the source to update.
     * @param array $attributes The attributes to update with.
     *
     * @return bool True if the source was updated, otherwise false.
     */
    public function update(int $id, array $attributes): bool
    {
        $source = source::findorFail($id);
        return $source->update($attributes);
    }

    /**
     * Deletes a source by its ID.
     *
     * @param int $id The ID of the source to delete.
     *
     * @return bool True if the source was deleted, otherwise false.
     */
    public function delete(int $id): bool
    {
        $source = source::findOrFail($id);
        return  $source->delete();
    }


    /**
     * Get the validation rules for the source attributes.
     *
     * @return array The validation rules for the source attributes.
     *               - 'name': Required string with a minimum length of 3 characters.
     *               - 'website': Optional string that must be a valid URL.
     *               - 'description': Optional string with a maximum length of 2000 characters.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'website' => 'required|string|url',
            'description' => 'nullable|string|max:2000',
        ];
    }
}
