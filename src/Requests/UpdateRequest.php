<?php
/**
 * Playground
 */
namespace Playground\Http\Requests;

/**
 * \Playground\Http\Requests\UpdateRequest
 */
abstract class UpdateRequest extends FormRequest implements Contracts\StoreContent, Contracts\StoreFilter, Contracts\StoreSlug
{
    use Concerns\StoreContent;
    use Concerns\StoreFilter;
    use Concerns\StoreSlug;

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            // 'slug.unique' => 'The :attribute has already been taken: :input',
            'slug.unique' => __('playground::validation.slug.unique'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();

        if (method_exists($this, 'rules_store_slug_update')) {
            $this->rules_store_slug_update($rules);
        }
        // dump([
        //     '__METHOD__' => __METHOD__,
        //     '__FILE__' => __FILE__,
        //     '__LINE__' => __LINE__,
        //     '$rules' => $rules,
        // ]);

        // \Log::debug(__METHOD__, [
        //     '$action' => $action,
        //     '$rules' => $rules,
        // ]);
        return $rules;
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (method_exists($this, 'prepareForValidationForSlug')) {
            $this->prepareForValidationForSlug();
        }
        // dd([
        //     '__METHOD__' => __METHOD__,
        //     '__FILE__' => __FILE__,
        //     '__LINE__' => __LINE__,
        //     'method_exists' => method_exists($this, 'prepareForValidationForSlug'),
        // ]);
    }
}
