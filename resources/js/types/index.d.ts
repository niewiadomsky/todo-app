export interface Task {
    id: number;
    title: string;
    is_completed: boolean;
    estimated_minutes?: number;
    created_at: string;
    updated_at: string;
    category_id: number | null;
    category?: Category;
    assigned_user?: AssignedUser;
    assigned_to: number | null;
}

export type TaskProperty = keyof Task;

export interface Category {
    id: number;
    name: string;
    tasks_count?: number;
}

export interface AssignedUser {
    id: number;
    name: string;
    avatar_url: string;
}
export interface LoggedUser {
    id: number;
    name: string;
    email: string;
    avatar_url: string;
}