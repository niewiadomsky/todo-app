export interface Task {
    id: number
    title: string
    category_id: number
    created_by: number
    assigned_to: number
    created_at: string
    updated_at: string
    deleted_at?: string
    category?: Category
}

export interface Category {
    id: number
    name: string
    created_at: string
    updated_at: string
    deleted_at?: string
}